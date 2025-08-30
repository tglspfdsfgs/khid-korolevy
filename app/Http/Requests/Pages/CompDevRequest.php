<?php

namespace App\Http\Requests\Pages;

use App\Enums\State;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompDevRequest extends FormRequest
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
            'state' => [
                'required',
                'string',
                Rule::in(array_column(State::cases(), 'value')),
            ],
            'title' => 'required|string',
            'description' => 'required|string',
            'badge' => 'string|nullable',
            'imageSrc' => 'string|nullable',
            'link' => 'string|nullable',
            'content' => 'required|string',
        ];
    }
}
