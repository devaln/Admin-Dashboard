<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('Auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME)->with('success', 'LoggedIn Successfully');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'LoggedOut Successfully');
    }

    /*
        Lockscreen
    */
    public function get(){

    // only if user is logged in
        if(Auth::check()){
            Session::put('locked', true);

            return view('layouts.locked');
        }

        return redirect()->route('login');
    }

    /*
        LockScreen Store
    */
    public function post(Request $request)
    {
    // if user in not logged in
        if(!Auth::check()) {
            return redirect('/login');
        }

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if(Hash::check($request->get('password'), Auth::user()->password)){
            Session::forget('locked');
            return redirect()->route('dashboard')->with('success', 'Welcome Back');
        }
        return back()->with('danger', 'Password Is Incorrect');
    }
}
