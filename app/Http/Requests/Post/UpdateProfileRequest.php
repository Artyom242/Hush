<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;


class UpdateProfileRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:10000',
        ];
    }
}
