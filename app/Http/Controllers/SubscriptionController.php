<?php

namespace App\Http\Controllers;

use App\Category;
use App\course_lectures;
use App\courses;
use App\Subscriptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Aler;

class SubscriptionController extends Controller
{
    private $subscription;
    private $courses;
    private $category;
    private $course_lectures;

    public function __construct(Subscriptions $subscription, courses $courses, Category $category, course_lectures $course_lectures)
    {
        $this->subscription = $subscription;
        $this->courses = $courses;
        $this->category = $category;
        $this->course_lectures = $course_lectures;
        $this->middleware('auth');
    }

    public function subscribe($id)
    {
        if (Subscriptions::where([
            ['user_id', '=', Auth::user()->id],
            ['course_id', '=', $id]
        ])->exists()) {
//            log::error('Message: đã đăng ký rồi');
            alert()->error('Lỗi','Bạn đã đăng ký khóa học này rồi.');
            return back();
        } else {
            try {
                DB::beginTransaction();
                $this->subscription->create([
                    'user_id' => Auth::user()->id,
                    'course_id' => $id
                ]);
                $sub = $this->courses->find($id)->subscriptions;
                $this->courses->find($id)->update([
                    'subscriptions' => $sub + 1
                ]);
                DB::commit();
                alert()->success('Đăng ký khóa học thành công!', 'Cùng học ngay nào (^.^)');
            } catch (\Exception $exception) {
                DB::rollBack();
                log::error('Message: ' . $exception->getMessage() . ' ---line: ' . $exception->getLine());
                alert()->error('Đăng ký thất bại!', 'Vui lòng báo lỗi với quản trị viên');
            }
        }

        return back();
    }

    public function unsubscribe($user_id, $course_id)
    {
        try {
            DB::beginTransaction();
            $this->subscription::where([
                'user_id' => $user_id,
                'course_id' => $course_id
            ])->delete();
            $sub = $this->courses->find($course_id)->subscriptions;
            $this->courses->find($course_id)->update([
                'subscriptions' => $sub - 1
            ]);
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            log::error('Message: ' . $exception->getMessage() . ' ---line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }

    public function learning($id)
    {
        $name = $this->courses->find($id)->name;
        $categories_limit = $this->category::where('parent_id', 0)->get();
        $lectures = $this->course_lectures::where('course_id', $id)->get();
        return view('users.learns.learning', compact('categories_limit', 'lectures', 'name'));
    }
}
