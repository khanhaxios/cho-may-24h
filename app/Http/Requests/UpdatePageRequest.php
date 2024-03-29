<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends CreatePageRequest
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
            'slug' => ['required', 'regex:/^[a-z]+([-\/]?[a-z]+)*$/', Rule::unique('pages')->ignore($this->request->get('id'), 'id')],
        ];
    }

}
