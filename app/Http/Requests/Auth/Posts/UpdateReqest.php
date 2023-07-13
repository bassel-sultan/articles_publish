<?php

namespace App\Http\Requests\Auth\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReqest extends FormRequest
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
            'title'=>['required','string'],
            'description'=>['required','string','max:3000'],
            'status'=>['required','integer'],
            'category'=>['required','integer'],
            'tags'=>['required','array'],
            'tags.*'=>['required','string'],
        ];
    }
}
