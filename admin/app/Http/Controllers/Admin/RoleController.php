<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index() 
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index' , compact('roles'));
    }

    public function create() 
    {
        return view('admin.roles.create');
    }

    public function store(Request $request) 
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        Role::create($validated);

        return to_route('admin.roles.index');
    }

    public function edit(Role $role) 
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role) 
    {
        $validated = $request->validate(['name' => ['required']]);
        $role->update($validated);

        return to_route('admin.roles.index');
    }

    public function destroy(Role $role) 
    {
        $role -> delete();
        return back() -> with('message', 'Role deleted');
    }

    public function givePermission(Request $request, Role $role) 
    {
        $role->givePermissionTo($request->permission);
        return back() -> with('message', 'Permission added');
    }

    public function revokePermission(Role $role, Permission $permission) 
    {
        $role->revokePermissionTo($permission);
        return back() -> with('message', 'Permission revoked');
    }
}
