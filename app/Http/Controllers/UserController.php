<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = new User();
        $action = URL::route('users.index');
        $title = "Create User";
        return view('users.index', compact('user', 'action', 'title'));
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
            'phone' => 'nullable|min:10|max:13',
            'email' => 'required|email',
            'password' => 'required',
            'gender' => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('avatar')) {
            $imageName = '/images/profile/' . time() . '.' . uniqid() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images/profile'), $imageName);
        }

        $user = new User();
        $user['avatar'] = ($request->hasFile('avatar'))? $imageName : Auth::user()->avatar;
        $user['first_name'] = $request->first_name ?? null;
        $user['middle_name'] = $request->middle_name ?? null;
        $user['last_name'] = $request->last_name ?? null;
        $user['phone'] = $request->phone ?? null;
        $user['email'] = $request->email;
        $user['password'] = (Auth::user()->password !== $request->password)? Hash::make($request->password) : $request->password;
        $user['gender'] = $request->gender ?? null;

        if ($user->save()) {
            return back()->with('success', 'Profile Updated Successfully');
        }

        return back()->with('danger', 'Somethings Goes Wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $action = URL::route('users.index');
        $title = "Create User";
        return view('users.index', compact('user', 'action', 'title'));
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
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('avatar')) {
            $imageName = '/images/profile/' . time() . '.' . uniqid() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images/profile'), $imageName);
        }

        $user['avatar'] = ($request->hasFile('avatar'))? $imageName : Auth::user()->avatar;
        $user['first_name'] = $request->first_name ?? null;
        $user['middle_name'] = $request->middle_name ?? null;
        $user['last_name'] = $request->last_name ?? null;
        $user['phone'] = $request->phone ?? null;
        $user['email'] = $request->email;
        $user['password'] = (Auth::user()->password !== $request->password)? Hash::make($request->password) : $request->password;
        $user['gender'] = $request->gender ?? null;

        if ($user->save()) {
            return back()->with('success', 'Profile Updated Successfully');
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
