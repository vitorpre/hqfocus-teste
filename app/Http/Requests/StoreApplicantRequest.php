<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicantRequest extends FormRequest
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
            'name'  => 'required',
            'email' => 'required|unique:applicants'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Necessário informar o nome',
            'email.required'    => 'Necessário informar o email',
            'email.unique'      => 'Email informado já está em uso'
        ];
    }
}
