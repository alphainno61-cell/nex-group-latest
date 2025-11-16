<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WelcomeSetting;

class WelcomeSettingController extends Controller
{
    public function index()
    {
        $settings = WelcomeSetting::first();
        if (!$settings) {
            $settings = WelcomeSetting::create([
                'site_title' => 'NEX GROUP',
                'hero_letter' => 'N',
                'hero_text' => 'is for NEX',
                'hero_description' => 'As we outlined in our initial letter, "NEX is not a conventional company. We do not intend to become one." We believe true innovation requires long-term patience and structural freedom.',
                'founder_name' => 'Engr. Mohammad Shahrair Khan',
                'founder_title' => 'Research Fellow || APU, Malaysia',
            ]);
        }
        return view('admin-welcome-settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_title' => 'required|string|max:255',
            'hero_letter' => 'required|string|max:5',
            'hero_text' => 'required|string|max:255',
            'hero_description' => 'nullable|string',
            'founder_name' => 'required|string|max:255',
            'founder_title' => 'nullable|string|max:255',
            'investor_link' => 'nullable|url',
            'signature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $settings = WelcomeSetting::first();
        if (!$settings) {
            $settings = new WelcomeSetting();
        }

        $settings->site_title = $request->site_title;
        $settings->hero_letter = $request->hero_letter;
        $settings->hero_text = $request->hero_text;
        $settings->hero_description = $request->hero_description;
        $settings->founder_name = $request->founder_name;
        $settings->founder_title = $request->founder_title;
        $settings->investor_link = $request->investor_link;

        // Handle signature image upload
        if ($request->hasFile('signature_image')) {
            // Delete old image if exists
            if ($settings->signature_image && file_exists(public_path($settings->signature_image))) {
                unlink(public_path($settings->signature_image));
            }
            
            $image = $request->file('signature_image');
            $imageName = time() . '_signature_' . $image->getClientOriginalName();
            $image->move(public_path('images/welcome'), $imageName);
            $settings->signature_image = '/images/welcome/' . $imageName;
        }

        // Handle logo image upload
        if ($request->hasFile('logo_image')) {
            // Delete old image if exists
            if ($settings->logo_image && file_exists(public_path($settings->logo_image))) {
                unlink(public_path($settings->logo_image));
            }
            
            $image = $request->file('logo_image');
            $imageName = time() . '_logo_' . $image->getClientOriginalName();
            $image->move(public_path('images/welcome'), $imageName);
            $settings->logo_image = '/images/welcome/' . $imageName;
        }

        $settings->save();

        return response()->json(['success' => true, 'message' => 'Settings updated successfully']);
    }
}
