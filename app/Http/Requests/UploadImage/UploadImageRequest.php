<?php

namespace App\Http\Requests\UploadImage;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => [
                'required',
                'file',
                'mimetypes:image/jpeg,image/png,image/gif,image/webp',
                'mimes:jpeg,png,gif,webp',
            ],

            'mainFolder' => 'string|required',
            'innerFolder' => 'nullable|string',
        ];
    }
}
