<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminRoleController extends Controller
{

    use DeleteModelTrait;

    private $role;
    private $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = $this->role->paginate(5);
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissionsParent'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $role = $this->role->create([
                'name' => $request->name,
                'display_name' => $request->display_name
            ]);
            $role->permissions()->attach($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        $role = $this->role->find($id);
        $permissionsChecked = $role->permissions;
        return view('admin.role.edit', compact('permissionsParent', 'role', 'permissionsChecked'));
    }

    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $role = $this->role->find($id);
            $role->update([
                'name' => $request->name,
                'display_name' => $request->display_name
            ]);
            $role->permissions()->sync($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->role);
    }


}
