<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFriendRequest extends FormRequest
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
            'ffname' => 'required|string|max:50|min:2',
            'flname' => 'required|string|max:50|min:2',
            'faddress' => 'required|string|max:50',
            'femail' => 'required|email',
            'fmobile' => 'required|max:13|string|min:10'
        ];
    }
}
