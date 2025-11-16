<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;

class SeeAllController extends Controller
{
    public function index()
    {
        $logos = Logo::orderBy('order')->get();
        return view('see-all', ['logos' => $logos]);
    }

    public function admin()
    {
        $logos = Logo::orderBy('order')->get();
        return view('admin-see-all', ['logos' => $logos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $lastOrder = Logo::max('order') ?? 0;
        
        $url = $request->url;
        
        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/logos'), $imageName);
            $url = '/images/logos/' . $imageName;
        }

        $logo = Logo::create([
            'name' => $request->name,
            'url' => $url,
            'order' => $lastOrder + 1,
        ]);

        return response()->json(['success' => true, 'logo' => $logo]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $logo = Logo::findOrFail($id);
        
        $url = $request->url ?? $logo->url;
        
        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete old image if it's stored locally
            if ($logo->url && strpos($logo->url, '/images/logos/') === 0) {
                $oldImagePath = public_path($logo->url);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/logos'), $imageName);
            $url = '/images/logos/' . $imageName;
        }

        $logo->update([
            'name' => $request->name,
            'url' => $url,
        ]);

        return response()->json(['success' => true, 'logo' => $logo]);
    }

    public function destroy($id)
    {
        $logo = Logo::findOrFail($id);
        
        // Delete image file if it's stored locally
        if ($logo->url && strpos($logo->url, '/images/logos/') === 0) {
            $imagePath = public_path($logo->url);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $logo->delete();

        return response()->json(['success' => true]);
    }
}
