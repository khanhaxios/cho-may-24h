<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePageRequest extends FormRequest
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
            'title' => 'required|min:10|max:255',
            'slug' => 'required|unique:pages,slug|regex:/^[a-z]+([-\/]?[a-z]+)*$/',
            'image' => 'required|image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'slug.regex' => __('admin.slug_validate'),
        ];
    }
}
