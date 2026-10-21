<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'activity_date' => 'nullable|date',
            'type'          => 'required|in:academica,deportiva,cultural',
            'category'      => 'nullable|string|max:100',
            'status'        => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título de la actividad es obligatorio.',
            'type.in'        => 'El tipo de actividad no es válido.',
        ];
    }
}
