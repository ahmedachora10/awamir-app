<?php

namespace App\Http\Requests;

use App\Rules\Text;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'image' => ['required', 'ends_with:jpg,jpeg,png,svg,webp'],
            'name' => ['required', new Text],
            'company' => ['required', 'string'],
            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'jobtype_id' => ['required', 'integer', 'exists:job_types,id'],
            'description' => ['required', 'string'],
            'source' => ['nullable'],
            'submission' => ['nullable'],
            'cv' => ['nullable'],
            'whatsapp' => ['sometimes'],
            'register_through_awamir' => ['nullable'],
        ];
    }
}
