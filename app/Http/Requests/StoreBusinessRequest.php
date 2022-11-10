<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessRequest extends FormRequest
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
            'bname' => 'required|string|max:50|min:5',
            'baddress' => 'required|string|max:50',
            'bwebsite' => 'nullable|url',
            'bemail' => 'nullable|email',
            'bmobile' => 'required|max:13|string|min:10'
        ];
    }
}
