<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * An authentication attempt.
     */
    public function authenticate(): bool
    {
        if (Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            $this->session()->regenerate();

            return true;
        }

        return false;
    }

    /**
     * Terminating the current session and logging out the user.
     */
    public function deauthenticate(): void
    {
        Auth::logout();

        $this->session()->invalidate();
        $this->session()->regenerateToken();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return string[]
     */
    public function rules(): array
    {
        return Auth::check() ? [] : [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
