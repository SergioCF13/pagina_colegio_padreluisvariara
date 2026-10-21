<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'lastname'    => 'required|string|max:255',
            'position'    => 'nullable|string|max:255',
            'area'        => 'nullable|string|max:255',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
            'role'        => 'required|in:director,docente,administrativo,apoyo',
            'order'       => 'nullable|integer|min:0',
            'status'      => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'El nombre es obligatorio.',
            'lastname.required' => 'El apellido es obligatorio.',
            'role.in'           => 'El rol seleccionado no es válido.',
        ];
    }
}
