<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /*
        Permission
    */
    function __construct()
    {
         $this->middleware('can:user list', ['only' => ['index','show']]);
         $this->middleware('can:user create', ['only' => ['create','store']]);
         $this->middleware('can:user edit', ['only' => ['edit','update']]);
         $this->middleware('can:user delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Manage Users";
        $users = User::all();
        $breadcrumb = '<li class="breadcrumb-item"><a href="'.URL::route('users.index').'"> Users </a></li>';
        return view('users.index', compact('users', 'title', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = new User();
        $action = URL::route('users.store');
        $title = "Create User";
        $roles = Role::all();
        $userHasRoles = [];
        $breadcrumb = '<li class="breadcrumb-item"><a href="'.URL::route('users.create').'"> Create User </a></li>';
        return view('users.edit', compact('user', 'action', 'title', 'roles', 'breadcrumb', 'userHasRoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'first_name' => 'nullable|min:3',
            'middle_name' => 'nullable|min:3',
            'last_name' => 'nullable|min:3',
            'phone' => 'nullable|min:10|max:13|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'gender' => 'nullable',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date_of_birth' => 'nullable|before:'.Carbon::yesterday(),
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('avatar')) {
            $imageName = '/images/profile/' . time() . '.' . uniqid() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images/profile'), $imageName);
        }

        $user = new User();
        $user['avatar'] = ($request->hasFile('avatar'))? $imageName : null;
        $user['first_name'] = $request->first_name ?? null;
        $user['middle_name'] = $request->middle_name ?? null;
        $user['last_name'] = $request->last_name ?? null;
        $user['phone'] = $request->phone ?? null;
        $user['email'] = $request->email;
        $user['password'] = (Auth::user()->password !== $request->password)? Hash::make($request->password) : $request->password;
        $user['gender'] = $request->gender ?? null;
        $user['date_of_birth'] = $request->date_of_birth ?? null;

        // dd($request->permissions);
        if ($user->save()) {
            if(! empty($request->permissions)) {
                $user->assignRoles($request->permissions);
            }
            return redirect()->route('users.edit', $user->id)->with('success', 'Profile Updated Successfully');
        }

        return back()->with('danger', 'Somethings Goes Wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        $title = "User Show";
        $roles = Role::all();
        $userHasRoles = array_column(json_decode($user->roles, true), 'id');
        return view('users.view', compact('user', 'title', 'roles', 'userHasRoles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $roles = Role::all();
        $userHasRoles = array_column(json_decode($user->roles, true), 'id');
        $action = URL::route('users.update', $user->id);
        $title = "Edit User";
        return view('users.edit', compact('user', 'action', 'title', 'roles', 'userHasRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $validator = Validator::make($request->all(), [
            'first_name' => 'nullable|min:3',
            'middle_name' => 'nullable|min:3',
            'last_name' => 'nullable|min:3',
            'phone' => 'nullable|min:10|max:13',
            'email' => 'required|email',
            'password' => 'required',
            'gender' => 'nullable',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date_of_birth' => 'nullable|before:'.Carbon::yesterday(),
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('avatar')) {
            $imageName = '/images/profile/' . time() . '.' . uniqid() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images/profile'), $imageName);
        }

        $user['avatar'] = ($request->hasFile('avatar'))? $imageName : $user->avatar;
        $user['first_name'] = $request->first_name ?? null;
        $user['middle_name'] = $request->middle_name ?? null;
        $user['last_name'] = $request->last_name ?? null;
        $user['phone'] = $request->phone ?? null;
        $user['email'] = $request->email;
        $user['password'] = ($user->password !== $request->password)? Hash::make($request->password) : $request->password;
        $user['gender'] = $request->gender ?? null;
        $user['date_of_birth'] = $request->date_of_birth ?? null;

        if ($user->save()) {
            $roles = $request->permissions ?? [];
            // dd($roles);
            $user->syncRoles($roles);
            return redirect()->route('users.show', $user->id)->with('success', 'Profile Updated Successfully');
        }

        return back()->with('danger', 'Somethings Goes Wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return back()->with('danger', 'User was deleted');
    }
}
