<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Auth;

class CreateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        //        $this->middleware('auth');
        if (auth()->check()) {
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
            'name' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'title' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'phone1' => 'required|unique:users|numeric|min:10',
            'email' => 'required|email|unique:users',
            'role' => 'required|alpha|max:12'
        ];
    }


    /**
     * Configure the validator instance.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Validation\Validator  $validator
     *
     */
    public function withValidator($validator)
    {
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);
        }
    }



    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Admin name is required',
            'name.regex'   => 'Name field accepts only characters and space',
            'email.required' => 'Email address is required',
            'email.unique' => 'Email already taken',
            'title.required' => 'Job title is required',
            'title.regex'  => 'Job title field accepts only characters and space',
            'phone1.required' => 'Phone number is required',
            'phone1.numeric' => 'Enter valid phone number',
            'phone1.unique' =>  'Phone number already taken',

        ];
    }
}
