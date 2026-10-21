<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $categories = GalleryCategory::active()->get();

        $photos = Gallery::with('category')
            ->when($request->category, fn($q) => $q->where('category_id', $request->category))
            ->latest()
            ->paginate(24);

        return view('admin.galeria.index', compact('photos', 'categories'));
    }

    public function create()
    {
        $categories = GalleryCategory::active()->get();
        return view('admin.galeria.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images'      => 'required|array|min:1',
            'images.*'    => 'required|image|mimes:jpg,jpeg,png,webp,gif,bmp|max:2048',
            'category_id' => 'nullable|exists:gallery_categories,id',
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'boolean',
        ]);

        $count = 0;
        foreach ($request->file('images') as $image) {
            $path = $image->store('gallery', 'public');
            Gallery::create([
                'image'       => $path,
                'title'       => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'status'      => $request->boolean('status', true),
            ]);
            $count++;
        }

        return redirect()->route('admin.galeria.index')
            ->with('success', "{$count} fotografía(s) subida(s) correctamente.");
    }

    public function edit(Gallery $galeria)
    {
        $categories = GalleryCategory::active()->get();
        $photo = $galeria;
        return view('admin.galeria.edit', compact('photo', 'categories'));
    }

    public function update(Request $request, Gallery $galeria)
    {
        $request->validate([
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,bmp|max:2048',
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:gallery_categories,id',
            'status'      => 'boolean',
        ]);

        $data = $request->only(['title', 'description', 'category_id']);
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            if ($galeria->image && Storage::disk('public')->exists($galeria->image)) {
                Storage::disk('public')->delete($galeria->image);
            }
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        $galeria->update($data);

        return redirect()->route('admin.galeria.index')
            ->with('success', 'Fotografía actualizada correctamente.');
    }

    public function destroy(Gallery $galeria)
    {
        if ($galeria->image && Storage::disk('public')->exists($galeria->image)) {
            Storage::disk('public')->delete($galeria->image);
        }
        $galeria->delete();

        return redirect()->route('admin.galeria.index')
            ->with('success', 'Fotografía eliminada correctamente.');
    }

    public function toggle(Gallery $galeria)
    {
        $galeria->update(['status' => !$galeria->status]);
        return back()->with('success', $galeria->status ? 'Fotografía activada.' : 'Fotografía desactivada.');
    }
}
