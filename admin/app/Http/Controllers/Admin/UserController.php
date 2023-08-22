<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.index', compact('users','roles','permissions'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user','roles','permissions'));
    }

    public function destroy(User $user) 
    {
        $user -> delete();
        return back() -> with('message', 'User deleted');
    }

    public function assignRole(Request $request, User $user) 
    {
        $user->assignRole($request -> role);
        return back() -> with('message', 'Role assigned');
    }

    public function removeRole(User $user, Role $role) 
    {
        $user->removeRole($role);
        return back() -> with('message', 'Role removed');
    }

    public function givePermission(Request $request, User $user) 
    {
        $user->givePermissionTo($request->permission);
        return back() -> with('message', 'Permission added');
    }

    public function revokePermission(User $user, Permission $permission) 
    {
        $user->revokePermissionTo($permission);
        return back() -> with('message', 'Permission revoked');
    }
}