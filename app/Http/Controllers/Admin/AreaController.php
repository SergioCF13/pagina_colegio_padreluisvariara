<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::orderBy('order')->paginate(20);
        return view('admin.areas.index', compact('areas'));
    }

    public function create()
    {
        return view('admin.areas.create');
    }

    public function store(AreaRequest $request)
    {
        $data = $request->validated();
        $data['status'] = $request->boolean('status', true);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('areas', 'public');
        }

        Area::create($data);

        return redirect()->route('admin.areas.index')
            ->with('success', 'Área educativa creada correctamente.');
    }

    public function edit(Area $area)
    {
        return view('admin.areas.edit', compact('area'));
    }

    public function update(AreaRequest $request, Area $area)
    {
        $data = $request->validated();
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            if ($area->image && Storage::disk('public')->exists($area->image)) {
                Storage::disk('public')->delete($area->image);
            }
            $data['image'] = $request->file('image')->store('areas', 'public');
        } else {
            unset($data['image']);
        }

        $area->update($data);

        return redirect()->route('admin.areas.index')
            ->with('success', 'Área educativa actualizada correctamente.');
    }

    public function destroy(Area $area)
    {
        if ($area->image && Storage::disk('public')->exists($area->image)) {
            Storage::disk('public')->delete($area->image);
        }
        $area->delete();

        return redirect()->route('admin.areas.index')
            ->with('success', 'Área educativa eliminada correctamente.');
    }
}
