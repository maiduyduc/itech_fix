<?php

namespace App\Http\Controllers;

use App\Role;
use App\Traits\DeleteModelTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    use DeleteModelTrait;

    private $user;
    private $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
        $this->middleware('auth');
    }

    public function index()
    {
        $users = $this->user->paginate(5);

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->role::all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level' => $request->level
            ]);
            $roleIds = $request->role_id;
            $user->roles()->attach($roleIds);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        $roles = $this->role::all();
        $role_user = $user->roles;
        return view('admin.user.edit', compact('user', 'roles', 'role_user'));
    }

    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level' => $request->level
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->user);
    }

    public function search(Request $request)
    {
        $input = $request->email;
        $emails = $this->user::where('email', $input)
            ->orWhere('email', 'like', '%' . $input . '%')->paginate(5);
        return view('admin.user.search', compact('emails', 'input'));
    }
}
