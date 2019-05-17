<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users,id,'.$this->user->id,
            'password' => 'sometimes|min:8',
            'bio' => 'sometimes|max:1000',
            'mobile' => 'sometimes|max:20',
            'gender' => 'sometimes|max:1|in:m,f',
            'avatar' => 'sometimes|image'
        ];
    }
}
