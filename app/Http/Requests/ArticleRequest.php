<?php

namespace App\Http\Requests;

use App\Enums\State;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Change the data before validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('date')) {
            $this->merge([
                'date' => Carbon::parse($this->input('date'))->toDateString(),
            ]);
        }
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
            'imageSrc' => 'string|nullable',
            'date' => 'required|date_format:Y-m-d',
            'content' => 'required|string',
        ];
    }
}
