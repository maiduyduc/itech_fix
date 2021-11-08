<?php

namespace App\Http\Controllers;

use App\Category;
use App\courses;
use App\Subscriptions;
use App\Traits\StorageImageTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Aler;

class UserController extends Controller
{
    use StorageImageTrait;

    private $category;
    private $user;
    private $courses;
    private $subscriptions;

    public function __construct(Category $category, User $user, courses $courses, Subscriptions $subscriptions)
    {
        $this->category = $category;
        $this->user = $user;
        $this->courses = $courses;
        $this->subscriptions = $subscriptions;
        $this->middleware('auth');
    }

    public function index()
    {
        $categories_limit = $this->category::where('parent_id', 0)->get();
        return view('users.profiles.info', compact('categories_limit'));
    }

    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $dataUserUpdate = [
                'name' => $request->name
            ];
            $dataUpload = $this->storageTraitUpload($request, 'image_path', 'user');
            if (!empty($dataUpload)) {
                $dataUserUpdate['avatar'] = $dataUpload['file_path'];
            }
//            dd($dataUserUpdate);
            $this->user->find($id)->update($dataUserUpdate);
            //nếu thành công thì update và database
            DB::commit();
            alert()->success('Thành công!', 'Cập nhật thông tin cá nhân thành công.');
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            //nếu không thành công thì khôi phục database về lúc chưa thực hiện hành động
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

    public function subscribe()
    {
        //lấy ra các bản ghi với điều kiện user_id = id user đang đăng nhập | 6 record/page
        $subscribe = $this->subscriptions::where('user_id', Auth::user()->id)->paginate(6);
        //lấy tất cả dữ liệu khóa học
        $courses = $this->courses::all();
        //lấy dữ liệu danh mục khóa học với điều kiện parent_id = 0
        $categories_limit = $this->category::where('parent_id', 0)->get();
        //trả về view và truyền các dữ liệu đã lấy ở trên sang view
        return view('users.profiles.subscription', compact('categories_limit', 'subscribe', 'courses'));
    }

    public function password()
    {
        $categories_limit = $this->category::where('parent_id', 0)->get();
        return view('users.profiles.password', compact('categories_limit'));
    }

    public function changePassword(Request $request)
    {
        if (Auth::Check()) {
            $requestData = $request->All();
            $validator = $this->validatePasswords($requestData);
            if ($validator->fails()) {
                alert()->error('Thất bại!', 'Mật khẩu mới phải trùng nhau và có ít nhất 3 ký tự!');
                return back()->withErrors($validator->getMessageBag());
            } else {
                $currentPassword = Auth::User()->password;
                if (Hash::check($requestData['password'], $currentPassword)) {
                    $userId = Auth::user()->id;
                    $user = User::find($userId);
                    $user->password = Hash::make($requestData['new-password']);;
                    $user->save();
                    alert()->success('Thành công!', 'Mật khẩu đã được đổi');
                    return back()->with('message', 'Your password has been updated successfully.');
                } else {
                    alert()->error('Thất bại!', 'Bạn đã nhập sai mật khẩu cũ!');
                    return back()->withErrors(['Sorry, your current password was not recognised. Please try again.']);
                }
            }
        } else {
            // Auth check failed - redirect to domain root
            alert()->error('Thất bại!', 'Bạn chưa đăng nhập!');
            return redirect()->to('/');
        }
    }

    /**
     * Validate password entry
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validatePasswords(array $data)
    {
        $messages = [
            'password.required' => 'Please enter your current password',
            'new-password.required' => 'Please enter a new password',
            'confirm-password.not_in' => 'Sorry, common passwords are not allowed. Please try a different new password.'
        ];

        $validator = Validator::make($data, [
            'password' => 'required',
//            'new-password' => ['required', 'same:new-password', 'min:3', Rule::notIn($this->bannedPasswords())],
            'new-password' => ['required', 'same:new-password', 'min:3'],
            'confirm-password' => 'required|same:new-password',
        ], $messages);

        return $validator;
    }

    /**
     * Get an array of all common passwords which we don't allow
     *
     * @return array
     */
//    public function bannedPasswords(){
//        return [
//            'password', '12345678', '123456789', 'baseball', 'football', 'jennifer', 'iloveyou', '11111111', '222222222', '33333333', 'qwerty123'
//        ];
//    }
}
