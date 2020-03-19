<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAdminForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->role == 'super_admin') {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:50|unique:admins',
            'title' =>  'required|string|string|max:255',
            'phone' => 'required|digits:10|max:10|unique:admins',
            'role'  => 'required|string|max:14',
        ];
    }
}
