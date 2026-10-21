<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolSettingController extends Controller
{
    public function index()
    {
        $settings = SchoolSetting::getCurrent();
        return view('admin.configuracion.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'school_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address'     => 'nullable|string|max:255',
            'phone'       => 'nullable|string|max:50',
            'whatsapp'    => 'nullable|string|max:50',
            'email'       => 'nullable|email|max:255',
            'facebook'    => 'nullable|url|max:255',
            'instagram'   => 'nullable|url|max:255',
            'youtube'     => 'nullable|url|max:255',
            'tiktok'      => 'nullable|url|max:255',
            'google_maps' => 'nullable|string',
            'schedule'    => 'nullable|string',
            'footer_text' => 'nullable|string|max:500',
            'logo'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'favicon'     => 'nullable|image|mimes:png,ico|max:100',
        ]);

        $settings = SchoolSetting::getCurrent();
        $data = $request->only([
            'school_name','description','address','phone','whatsapp',
            'email','facebook','instagram','youtube','tiktok',
            'google_maps','schedule','footer_text',
        ]);

        // Logo
        if ($request->hasFile('logo')) {
            if ($settings->logo && Storage::disk('public')->exists($settings->logo)) {
                Storage::disk('public')->delete($settings->logo);
            }
            $data['logo'] = $request->file('logo')->store('settings', 'public');
        }

        // Favicon
        if ($request->hasFile('favicon')) {
            if ($settings->favicon && Storage::disk('public')->exists($settings->favicon)) {
                Storage::disk('public')->delete($settings->favicon);
            }
            $data['favicon'] = $request->file('favicon')->store('settings', 'public');
        }

        $settings->update($data);

        return redirect()->route('admin.configuracion.index')
            ->with('success', 'Configuración actualizada correctamente.');
    }
}
