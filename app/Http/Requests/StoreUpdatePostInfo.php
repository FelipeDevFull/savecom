<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class StoreUpdatePostInfo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            //'title' => 'required|min:5|unique:post_infos', title deve ser único na tabela "post_infos".
            'title' => 'required|min:5',
            'date' => 'date',
            'time' => 'date_format:H:i',
            'description' => 'required|min:10', 
        ];

        if ($this->method() === 'PUT') {
            $rules['title'] = [
                'required',
                'min:5',
                Rule::unique('post_infos')->ignore($this->id)->where(function ($query) {$query->where('user_id', Auth::id());
                }),
            ];
        }

        return $rules;
    }

}
