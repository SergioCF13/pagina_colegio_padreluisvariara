<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstitutionalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstitutionalInformationController extends Controller
{
    public function index()
    {
        $info = InstitutionalInformation::getCurrent();
        return view('admin.institucion.index', compact('info'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'history'       => 'nullable|string',
            'history_title' => 'nullable|string|max:255',
            'history_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'mission'       => 'nullable|string',
            'vision'        => 'nullable|string',
            'values'        => 'nullable|string',
            'objectives'    => 'nullable|string',
            'education_level' => 'nullable|string|max:255',
            'general_info'  => 'nullable|string',
        ]);

        $info = InstitutionalInformation::getCurrent();

        $data = $request->only([
            'history','history_title','mission','vision',
            'values','objectives','education_level','general_info',
        ]);

        // Imagen histórica
        if ($request->hasFile('history_image')) {
            if ($info->history_image && Storage::disk('public')->exists($info->history_image)) {
                Storage::disk('public')->delete($info->history_image);
            }
            $data['history_image'] = $request->file('history_image')->store('institutional', 'public');
        }

        $info->update($data);

        return redirect()->route('admin.institucion.index')
            ->with('success', 'Información institucional actualizada correctamente.');
    }
}
