<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    //
    public function create()
    {
        $title = "Settings";
        $setting = new Setting();
        return view('users.settings', compact('title', 'setting'));
    }
    /*
        Edit Setting
    */
    public function edit(Setting $setting)
    {
        $title = "Settings";
        return view('users.settings', compact('setting', 'title'));
    }
    /*
        Create Setting
    */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_name' => 'required|min:3',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'nullable',
            'footer' => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('favicon')) {
            $favicon = '/images/setting/' . time() . '.' . uniqid() . '.' . $request->favicon->extension();
            $request->favicon->move(public_path('images/setting'), $favicon);
        }

        if ($request->hasFile('logo')) {
            $logo = '/images/setting/' . time() . '.' . uniqid() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images/setting'), $logo);
        }

        $setting = new Setting();
        $setting['site_name'] = $request->site_name;
        $setting['favicon'] = ($request->hasFile('favicon'))? $favicon : null;
        $setting['logo'] = ($request->hasFile('logo'))? $logo: null;
        $setting['type'] = $request->type ?? null;
        $setting['footer'] = $request->footer ?? null;
        $setting['user_id'] = Auth::user()->id;

        if ($setting->save()) {
            return back()->with('success', 'Uploaded Successfully');
        }
        return back()->with('danger', 'Something Goes Wrong');
    }
    /*
        Update Setting
    */
    public function update(Request $request, Setting $setting)
    {
        $validator = Validator::make($request->all(), [
            'site_name' => 'required|min:3',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'nullable',
            'footer' => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('favicon')) {
            $favicon = '/images/setting/' . time() . '.' . uniqid() . '.' . $request->favicon->extension();
            $request->favicon->move(public_path('images/setting'), $favicon);
        }

        if ($request->hasFile('logo')) {
            $logo = '/images/setting/' . time() . '.' . uniqid() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images/setting'), $logo);
        }

        $setting['site_name'] = $request->site_name;
        $setting['favicon'] = ($request->hasFile('favicon'))? $favicon : $setting->favicon;
        $setting['logo'] = ($request->hasFile('logo'))? $logo: $setting->logo;
        $setting['type'] = $request->type ?? null;
        $setting['footer'] = $request->footer ?? null;
        $setting['user_id'] = Auth::user()->id;

        if ($setting->save()) {
            return back()->with('success', 'Uploaded Successfully');
        }
        return back()->with('danger', 'Something Goes Wrong');
    }
}
