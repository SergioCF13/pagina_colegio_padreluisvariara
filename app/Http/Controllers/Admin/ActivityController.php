<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $activities = Activity::when($request->type, fn($q) => $q->where('type', $request->type))
            ->latest('activity_date')
            ->paginate(15);

        return view('admin.actividades.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.actividades.create');
    }

    public function store(ActivityRequest $request)
    {
        $data = $request->validated();
        $data['status'] = $request->boolean('status', true);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('activities', 'public');
        }

        Activity::create($data);

        return redirect()->route('admin.actividades.index')
            ->with('success', 'Actividad creada correctamente.');
    }

    public function edit(Activity $actividad)
    {
        $activity = $actividad;
        return view('admin.actividades.edit', compact('activity'));
    }

    public function update(ActivityRequest $request, Activity $actividad)
    {
        $data = $request->validated();
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            if ($actividad->image && Storage::disk('public')->exists($actividad->image)) {
                Storage::disk('public')->delete($actividad->image);
            }
            $data['image'] = $request->file('image')->store('activities', 'public');
        } else {
            unset($data['image']);
        }

        $actividad->update($data);

        return redirect()->route('admin.actividades.index')
            ->with('success', 'Actividad actualizada correctamente.');
    }

    public function destroy(Activity $actividad)
    {
        if ($actividad->image && Storage::disk('public')->exists($actividad->image)) {
            Storage::disk('public')->delete($actividad->image);
        }
        $actividad->delete();

        return redirect()->route('admin.actividades.index')
            ->with('success', 'Actividad eliminada correctamente.');
    }
}
