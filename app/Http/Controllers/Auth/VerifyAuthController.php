<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class VerifyAuthController extends Controller
{
    //
    /*
        getLogin
    */
    public function getLogin()
    {
        $title = "Login Page";
        return view('Auth.login', compact('title'));
    }
    /*
        getRegister
    */
    public function getRegister()
    {
        $title = "Register Page";
        return view('Auth.register', compact('title'));
    }
    /*
        postLogin
    */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']], true)) {
            return redirect()->route('user.dashboard')->with('success', 'Successfully Logged In');
        }
    }
    /*
        postRegister
    */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        $user = new User();
        $user['first_name'] = $request->first_name ?? null;
        $user['last_name'] = $request->last_name ?? null;
        $user['email'] = $request->email;
        $user['password'] = Hash::make($request->password);
        if ($user->save()) {
            DB::commit();
            return redirect()->route('user.dashboard')->with('success', 'Successfully Logged In');
        }
        return back()->with('danger', 'Something Went Wrong');
    }
    /*
        Logout
    */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login')->with('warning', 'Successfully Logged Out');
    }
    /*
        dashboard
    */
    public function dashboard()
    {
        return view('dashboard');
    }
    /*
        Profile Controller
    */
    public function profile()
    {
        $title = "Edit Profile";
        $action = URL::route('user.profile.store');
        $user = User::find(Auth::user()->id);
        return view('Auth.profile', compact('title', 'action', 'user'));
    }
    /*
        Profile Post Controller
    */
    public function postProfile(Request $request)
    {
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

        $user = User::find(Auth::user()->id);
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
}
