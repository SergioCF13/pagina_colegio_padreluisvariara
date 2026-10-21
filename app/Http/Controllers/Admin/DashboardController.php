<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Area;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\News;
use App\Models\SchoolSetting;
use App\Models\Teacher;

class DashboardController extends Controller
{
    public function index()
    {
        $settings = SchoolSetting::getCurrent();

        $stats = [
            'news'              => News::count(),
            'news_published'    => News::where('status', 'published')->count(),
            'events'            => Event::count(),
            'upcoming_events'   => Event::upcoming()->count(),
            'gallery'           => Gallery::count(),
            'gallery_categories'=> GalleryCategory::count(),
            'areas'             => Area::count(),
            'teachers'          => Teacher::count(),
            'activities'        => Activity::count(),
        ];

        $latestNews     = News::latest()->take(5)->get();
        $upcomingEvents = Event::upcoming()->take(5)->get();

        return view('admin.dashboard', compact('settings', 'stats', 'latestNews', 'upcomingEvents'));
    }
}
