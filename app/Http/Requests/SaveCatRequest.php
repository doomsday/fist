<?php

namespace Furbook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Since we're handling user authentication via middleware,
        // we can simply switch this to return true instead.
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
            'name' => 'required|min:3',
            'date_of_birth' => 'required|date'
        ];
    }
}
