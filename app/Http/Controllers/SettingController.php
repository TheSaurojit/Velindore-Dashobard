<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //

    public function updateView()
    {
        // function body
        $settings = Setting::find(1);
        return view('pages.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        // function body

        $data = $request->validate([
            'payment_api_key'   => 'nullable|string|max:255',
            'payment_tax'       => 'required|numeric|min:0|max:100',
            'home_title'        => 'nullable|string|max:255',
            'contact_email'     => 'nullable|email|max:255',
            'contact_number'    => 'nullable|numeric',
            'facebook_link'     => 'nullable|url|max:255',
            'instagram_link'    => 'nullable|url|max:255',
            'linkedin_link'     => 'nullable|url|max:255',
        ]);

        Setting::updateOrCreate(
            ['id' => 1],
            $data
        );


        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}
