<?php

namespace App\Http\Requests;

use App\Models\Subscriber;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSubscriberRequest extends FormRequest
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
            'email' => ['required','email', $this->isSameEmail()]
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'هذا البريد الالكتروني موجود مسبقا'
        ];
    }

    private function isSameEmail()
    {
        return  $this->route('subscriber')->email == $this->input('email') ? null : 'unique:subscribers,email';
    }
}
