<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCommentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'content' => 'bail|required',
            'author' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Field is required',
            'author.required' => 'Field is required',
        ];
    }
}
