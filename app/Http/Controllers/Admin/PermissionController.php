<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission as ModelsPermission;

class PermissionController extends Controller
{
    //
    function __construct()
    {
         $this->middleware('can:permission list', ['only' => ['index','show']]);
         $this->middleware('can:permission create', ['only' => ['create','store']]);
         $this->middleware('can:permission edit', ['only' => ['edit','update']]);
         $this->middleware('can:permission delete', ['only' => ['destroy']]);
    }
    /*
        Index
    */
    public function index()
    {
        $title = "User Permission Index";
        $permissions = ModelsPermission::all();
        return view('Admin.permissions.index', compact('title', 'permissions'));
    }
    /*
        Create
    */
    public function create()
    {
        $title = "User Permission Create";
        $permission = new ModelsPermission();
        $action = URL::route('permissions.store');
        return view('Admin.permissions.edit', compact('title', 'permission', 'action'));
    }
    /*
        Edit
    */
    public function edit(ModelsPermission $permission)
    {
        $title = "User Permission Edit";
        $action = URL::route('permissions.update', $permission->id);
        return view('Admin.permissions.edit', compact('title', 'permission', 'action'));
    }
    /*
        Show
    */
    public function show(ModelsPermission $permission)
    {
        $title = "User Permission Show";
        return view('Admin.permissions.index', compact('title', 'permission'));
    }
    /*
        Store
    */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:'.config('permission.table_names.permissions', 'permissions').',name,'.$permission->id,
            'guard_name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $permission = new ModelsPermission();
        $permission['name'] = $request->name;
        $permission['guard_name'] = $request->guard_name;

        if ($permission->save()) {
            return redirect()->route('permissions.edit', $permission->id)->with('success', 'Permission Created Successfully');
        }
        return back()->with('danger', 'Something Goes Wrong');
    }
    /*
        Update
    */
    public function update(Request $request, ModelsPermission $permission)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:'.config('permission.table_names.permissions', 'permissions').',name,'.$permission->id,
            'guard_name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $permission['name'] = $request->name;
        $permission['guard_name'] = $request->guard_name;

        if ($permission->save()) {
            return redirect()->route('permissions.index')->with('success', 'Permission Created Successfully');
        }
        return back()->with('danger', 'Something Goes Wrong');
    }
    /*
        Destroy
    */
    public function destroy(ModelsPermission $permission)
    {
        $permission->delete();
        return back()->with('success', 'Successfully Deleted');
    }
}
