<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    public function rules(): array
    {  
    return [
            'title' => "bail|required|unique:post,title,{$this->input('id')}",
            'body' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Field is required',
            'body.required' => 'Field is required'
        ];
    }
}
