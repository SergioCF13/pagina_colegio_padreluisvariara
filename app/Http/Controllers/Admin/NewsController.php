<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::when($request->search, fn($q) => $q->where('title', 'like', "%{$request->search}%"))
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->latest()
            ->paginate(15);

        return view('admin.noticias.index', compact('news'));
    }

    public function create()
    {
        return view('admin.noticias.create');
    }

    public function store(NewsRequest $request)
    {
        $data = $request->validated();

        // Generar slug
        $data['slug'] = News::generateSlug($data['title']);

        // Publicación automática de fecha
        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        // Imagen
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);

        return redirect()->route('admin.noticias.index')
            ->with('success', 'Noticia creada correctamente.');
    }

    public function edit(News $news)
    {
        return view('admin.noticias.edit', compact('news'));
    }

    public function update(NewsRequest $request, News $news)
    {
        $data = $request->validated();

        // Regenerar slug si cambió el título
        if ($data['title'] !== $news->title) {
            $data['slug'] = News::generateSlug($data['title'], $news->id);
        }

        if ($data['status'] === 'published' && !$news->published_at) {
            $data['published_at'] = $data['published_at'] ?? now();
        }

        // Imagen
        if ($request->hasFile('image')) {
            // Eliminar imagen anterior
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        } else {
            unset($data['image']);
        }

        $news->update($data);

        return redirect()->route('admin.noticias.index')
            ->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy(News $news)
    {
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        return redirect()->route('admin.noticias.index')
            ->with('success', 'Noticia eliminada correctamente.');
    }
}
