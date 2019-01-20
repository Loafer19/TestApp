<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBillRequest extends FormRequest
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
        $valid = [
            'value' => ['required', 'numeric', 'max:10000'],
            'type' => ['required'],
            'currency' => ['required', 'string', 'max:55'],
            'description' => ['required', 'string', 'max:500'],
        ];

        return $valid;
    }
}
