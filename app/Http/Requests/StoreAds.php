<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAds extends FormRequest
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


          //  'status' => 'required|max:20',
           // 'file' => 'required|mimes:txt|max:50048',

        ];
    }

    /**
     * Configure the validator instance.
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Validation\Validator $validator
     * @return
     */
    public function withValidator($validator)
    {
        if ($validator->fails()) {

            return redirect()->back()->with('validationFailed', 'Something went wrong.Please check  highlighted fields for errors!');

        }

    }
}
