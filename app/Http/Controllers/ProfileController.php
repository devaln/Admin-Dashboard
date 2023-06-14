<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $pro_user = $request->user();
        $title = "User Profile Edit";
        $roles = Role::all();
        $userHasRoles = array_column(json_decode($pro_user->roles, true), 'id');
        return view('profile.edit', compact('pro_user', 'title', 'roles', 'userHasRoles'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // $request->user()->fill($request->validated());
        if ($request->hasFile('avatar')) {
            $imageName = '/images/profile/' . time() . '.' . uniqid() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images/profile'), $imageName);
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $data = [];
        $data['avatar'] = ($request->hasFile('avatar'))? $imageName : Auth::user()->avatar;
        $data['first_name'] = $request->first_name ?? null;
        $data['middle_name'] = $request->middle_name ?? null;
        $data['last_name'] = $request->last_name ?? null;
        $data['phone'] = $request->phone ?? null;
        $data['email'] = $request->email;
        $data['password'] = (Auth::user()->password !== $request->password)? Hash::make($request->password) : $request->password;
        $data['gender'] = $request->gender ?? null;
        $data['date_of_birth'] = $request->date_of_birth ?? null;

        if ($request->user()->update($data)) {
            // $roles = $request->roles ?? [];
            // $user->syncRole($roles);
            return redirect()->route('profile.edit')->with('success', 'Profile Updated Successfully');
        }
        return back()->with('danger', 'Somethings Goes Wrong');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        
        $user = $request->user();
        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
