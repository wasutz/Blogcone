<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    protected $rules = [
        'title'   => 'required|max:255',
        'content' => 'required',
    ];

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $this->rules;
    }
}
