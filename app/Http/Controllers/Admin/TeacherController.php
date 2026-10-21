<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('order')->paginate(15);
        return view('admin.docentes.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.docentes.create');
    }

    public function store(TeacherRequest $request)
    {
        $data = $request->validated();
        $data['status'] = $request->boolean('status', true);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        Teacher::create($data);

        return redirect()->route('admin.docentes.index')
            ->with('success', 'Docente registrado correctamente.');
    }

    public function edit(Teacher $docente)
    {
        $teacher = $docente;
        return view('admin.docentes.edit', compact('teacher'));
    }

    public function update(TeacherRequest $request, Teacher $docente)
    {
        $data = $request->validated();
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('photo')) {
            if ($docente->photo && Storage::disk('public')->exists($docente->photo)) {
                Storage::disk('public')->delete($docente->photo);
            }
            $data['photo'] = $request->file('photo')->store('teachers', 'public');
        } else {
            unset($data['photo']);
        }

        $docente->update($data);

        return redirect()->route('admin.docentes.index')
            ->with('success', 'Docente actualizado correctamente.');
    }

    public function destroy(Teacher $docente)
    {
        if ($docente->photo && Storage::disk('public')->exists($docente->photo)) {
            Storage::disk('public')->delete($docente->photo);
        }
        $docente->delete();

        return redirect()->route('admin.docentes.index')
            ->with('success', 'Docente eliminado correctamente.');
    }
}
