<?php

namespace App\Http\Requests;

use App\Rules\Text;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'email'],
            // 'password' => ['sometimes','required', 'confirmed', Password::defaults()],
            'role' => ['required', 'exists:roles,id']
        ];
    }
}
