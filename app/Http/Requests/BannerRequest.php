<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $imageRule = $this->isMethod('POST')
            ? 'required|image|mimes:jpg,jpeg,png,webp|max:3072'
            : 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072';

        return [
            'image'              => $imageRule,
            'title'              => 'nullable|string|max:255',
            'subtitle'           => 'nullable|string|max:255',
            'btn_primary_text'   => 'nullable|string|max:100',
            'btn_primary_url'    => 'nullable|string|max:255',
            'btn_secondary_text' => 'nullable|string|max:100',
            'btn_secondary_url'  => 'nullable|string|max:255',
            'order'              => 'nullable|integer|min:0',
            'status'             => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'La imagen del banner es obligatoria.',
            'image.max'      => 'La imagen no debe superar 3MB.',
        ];
    }
}
