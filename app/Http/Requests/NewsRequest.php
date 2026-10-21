<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'        => 'required|string|max:255',
            'summary'      => 'nullable|string|max:1000',
            'content'      => 'required|string',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'author'       => 'nullable|string|max:255',
            'status'       => 'required|in:published,draft',
            'published_at' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'   => 'El título es obligatorio.',
            'content.required' => 'El contenido es obligatorio.',
            'image.image'      => 'El archivo debe ser una imagen.',
            'image.max'        => 'La imagen no debe superar 2MB.',
            'status.in'        => 'El estado no es válido.',
        ];
    }
}
