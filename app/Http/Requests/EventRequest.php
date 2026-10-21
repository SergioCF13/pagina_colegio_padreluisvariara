<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'event_date' => 'required|date',
            'event_time' => 'nullable|date_format:H:i,H:i:s',
            'location' => 'nullable|string|max:255',
            'category' => 'required|string|max:100',
            'status' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título del evento es obligatorio.',
            'event_date.required' => 'La fecha del evento es obligatoria.',
            'event_date.date' => 'La fecha no es válida.',
            'event_time.date_format' => 'La hora debe tener un formato válido.',
            'image.max' => 'La imagen no debe superar 2MB.',
        ];
    }
}
