<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::withCount('photos')->latest()->get();
        return view('admin.categorias.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255|unique:gallery_categories,name',
            'description' => 'nullable|string',
            'status'      => 'boolean',
        ]);

        GalleryCategory::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
            'status'      => $request->boolean('status', true),
        ]);

        return redirect()->route('admin.categorias.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    public function edit(GalleryCategory $categoria)
    {
        $category = $categoria;
        return view('admin.categorias.edit', compact('category'));
    }

    public function update(Request $request, GalleryCategory $categoria)
    {
        $request->validate([
            'name'        => "required|string|max:255|unique:gallery_categories,name,{$categoria->id}",
            'description' => 'nullable|string',
            'status'      => 'boolean',
        ]);

        $categoria->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
            'status'      => $request->boolean('status'),
        ]);

        return redirect()->route('admin.categorias.index')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy(GalleryCategory $categoria)
    {
        $categoria->delete();
        return redirect()->route('admin.categorias.index')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}
