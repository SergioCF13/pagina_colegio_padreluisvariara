<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::when($request->search, fn($q) => $q->where('title', 'like', "%{$request->search}%"))
            ->when($request->category, fn($q) => $q->where('category', $request->category))
            ->orderBy('event_date', 'desc')
            ->paginate(15);

        return view('admin.eventos.index', compact('events'));
    }

    public function create()
    {
        return view('admin.eventos.create');
    }

    public function store(EventRequest $request)
    {
        $data = $request->validated();
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.eventos.index')
            ->with('success', 'Evento creado correctamente.');
    }

    public function edit(Event $event)
    {
        return view('admin.eventos.edit', compact('event'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $data = $request->validated();
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        } else {
            unset($data['image']);
        }

        $event->update($data);

        return redirect()->route('admin.eventos.index')
            ->with('success', 'Evento actualizado correctamente.');
    }

    public function destroy(Event $event)
    {
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }
        $event->delete();

        return redirect()->route('admin.eventos.index')
            ->with('success', 'Evento eliminado correctamente.');
    }

    public function toggle(Event $event)
    {
        $event->update(['status' => !$event->status]);
        $msg = $event->status ? 'Evento activado.' : 'Evento desactivado.';
        return back()->with('success', $msg);
    }
}
