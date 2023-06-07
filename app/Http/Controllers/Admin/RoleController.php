<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    function __construct()
    {
         $this->middleware('can:role list', ['only' => ['index','show']]);
         $this->middleware('can:role create', ['only' => ['create','store']]);
         $this->middleware('can:role edit', ['only' => ['edit','update']]);
         $this->middleware('can:role delete', ['only' => ['destroy']]);
    }
    /*
        Index
    */
    public function index()
    {
        $title = "User Role Index";
        $roles = Role::all();
        return view('Admin.roles.index', compact('title', 'roles'));
    }
    /*
        Create
    */
    public function create()
    {
        $title = "User Role Create";
        $role = new Role();
        $action = URL::route('roles.store');
        $permissions = Permission::all();
        $roleHasPermissions = [];
        return view('Admin.roles.edit', compact('title', 'role', 'action', 'permissions', 'roleHasPermissions'));
    }
    /*
        Edit
    */
    public function edit(Role $role)
    {
        $title = "User Role Edit";
        $action = URL::route('roles.update', $role->id);
        $permissions = Permission::all();
        $roleHasPermissions = array_column(json_decode($role->permissions, true), 'id');
        return view('Admin.roles.edit', compact('title', 'role', 'action', 'permissions', 'roleHasPermissions'));
    }
    /*
        Show
    */
    public function show(Role $role)
    {
        $title = "User Role Show";
        $permissions = Permission::all();
        $roleHasPermissions = array_column(json_decode($role->permissions, true), 'id');
        return view('Admin.roles.show', compact('title', 'role', 'permissions', 'roleHasPermissions'));
    }
    /*
        Store
    */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:'.config('permission.table_names.roles', 'roles').',name',
            'guard_name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $role = new Role();
        $role['name'] = $request->name;
        $role['guard_name'] = $request->guard_name;

        if ($role->save()) {
            if(! empty($request->permissions)) {
                $role->givePermissionTo($request->permissions);
            }
            return redirect()->route('roles.edit', $role->id)->with('success', 'Role Created Successfully');
        }
        return back()->with('danger', 'Something Goes Wrong');
    }
    /*
        Update
    */
    public function update(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'guard_name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($role->update($request->all())) {
            $permissions = $request->permissions ?? [];
            $role->syncPermissions($permissions);
            return redirect()->route('roles.index')->with('success', 'Role Created Successfully');
        }
        return back()->with('danger', 'Something Goes Wrong');
    }
    /*
        Destroy
    */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('success', 'Successfully Deleted');
    }
}
