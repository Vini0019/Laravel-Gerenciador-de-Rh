<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updatePasswordRequest extends FormRequest
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
            'curent_password' => 'required|max:20|min:8',
            'new_password' => 'required|max:20|min:8|different:current_password',
            'new_password_confirmation' => 'required|same:new_password'
        ];
    }

}
