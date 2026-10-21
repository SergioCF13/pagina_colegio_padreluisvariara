<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Area;
use App\Models\Banner;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\InstitutionalInformation;
use App\Models\News;
use App\Models\Teacher;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // ─── Inicio ──────────────────────────────────────────────
    public function inicio()
    {
        $banners = Banner::active()->get();
        $upcomingEvents = Event::upcoming()->take(6)->get();
        $latestNews = News::published()->take(6)->get();
        $areas = Area::active()->take(8)->get();
        $info = InstitutionalInformation::getCurrent();
        $recentPhotos = Gallery::active()->take(9)->get();
        $teachers = Teacher::active()->take(8)->get();
        $publicStats = [
            'teachers' => Teacher::active()->count(),
            'areas' => Area::active()->count(),
            'photos' => Gallery::active()->count(),
            'events' => Event::upcoming()->count(),
        ];

        return view('public.inicio', compact(
            'banners', 'upcomingEvents', 'latestNews',
            'areas', 'info', 'recentPhotos', 'teachers', 'publicStats'
        ));
    }

    // ─── Institución ─────────────────────────────────────────
    public function institucion()
    {
        $info = InstitutionalInformation::getCurrent();

        return view('public.institucion', compact('info'));
    }

    // ─── Historia ────────────────────────────────────────────
    public function historia()
    {
        $info = InstitutionalInformation::getCurrent();

        return view('public.historia', compact('info'));
    }

    // ─── Noticias (listado) ───────────────────────────────────
    public function noticias(Request $request)
    {
        $news = News::published()
            ->when($request->search, fn ($q) => $q->where('title', 'like', "%{$request->search}%"))
            ->paginate(9);

        return view('public.noticias', compact('news'));
    }

    // ─── Noticia (detalle) ────────────────────────────────────
    public function noticiaDetalle(string $slug)
    {
        $news = News::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $related = News::published()
            ->where('id', '!=', $news->id)
            ->take(3)->get();

        return view('public.noticia-detalle', compact('news', 'related'));
    }

    // ─── Eventos (listado) ────────────────────────────────────
    public function eventos(Request $request)
    {
        $events = Event::active()
            ->when($request->category, fn ($q) => $q->where('category', $request->category))
            ->paginate(9);

        $categories = Event::categories();

        return view('public.eventos', compact('events', 'categories'));
    }

    // ─── Evento (detalle) ─────────────────────────────────────
    public function eventoDetalle(int $id)
    {
        $event = Event::where('status', true)->findOrFail($id);
        $related = Event::active()
            ->where('id', '!=', $id)
            ->where('category', $event->category)
            ->take(3)->get();

        return view('public.evento-detalle', compact('event', 'related'));
    }

    // ─── Galería ─────────────────────────────────────────────
    public function galeria(Request $request)
    {
        $categories = GalleryCategory::active()->withCount(['photos' => fn ($q) => $q->where('status', true)])->get();

        $photos = Gallery::active()
            ->when($request->category, fn ($q) => $q->where('category_id', $request->category))
            ->paginate(24);

        return view('public.galeria', compact('photos', 'categories'));
    }

    // ─── Áreas educativas ─────────────────────────────────────
    public function areas()
    {
        $areas = Area::active()->get();

        return view('public.areas', compact('areas'));
    }

    // ─── Actividades académicas ───────────────────────────────
    public function actividadesAcademicas()
    {
        $activities = Activity::active()->ofType('academica')->paginate(9);

        return view('public.actividades', [
            'activities' => $activities,
            'type' => 'academica',
            'title' => 'Actividades Académicas',
        ]);
    }

    // ─── Actividades deportivas ───────────────────────────────
    public function actividadesDeportivas()
    {
        $activities = Activity::active()->ofType('deportiva')->paginate(9);

        return view('public.actividades', [
            'activities' => $activities,
            'type' => 'deportiva',
            'title' => 'Actividades Deportivas',
        ]);
    }

    // ─── Actividades culturales ───────────────────────────────
    public function actividadesCulturales()
    {
        $activities = Activity::active()->ofType('cultural')->paginate(9);

        return view('public.actividades', [
            'activities' => $activities,
            'type' => 'cultural',
            'title' => 'Actividades Culturales',
        ]);
    }

    // ─── Personal ─────────────────────────────────────────────
    public function personal()
    {
        $teachers = Teacher::active()->get()->groupBy('role');

        return view('public.personal', compact('teachers'));
    }

    // ─── Contacto ─────────────────────────────────────────────
    public function contacto()
    {
        return view('public.contacto');
    }
}
