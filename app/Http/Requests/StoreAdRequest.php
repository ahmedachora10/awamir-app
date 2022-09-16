<?php

namespace App\Http\Requests;

use App\Rules\Text;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdRequest extends FormRequest
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
            'name' => ['required', new Text],
            'content' => ['required', 'max:16777215'],
            'status' => ['sometimes', 'integer', Rule::in([1,2])]
        ];
    }
}
