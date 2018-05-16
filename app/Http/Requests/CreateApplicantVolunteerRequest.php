<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateApplicantVolunteerRequest extends FormRequest
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
            'name'          => 'required|string',
            'age'           => 'required|integer',
            'address'       => 'required|string',
            'email'         => 'required|email',
            'mobileNumber'  => 'required|string',
            'job/study'     => 'nullable|string',
            'aboutMe'       => 'required|string',
            'driverLicense' => 'required|boolean',
            'shareRoom'     => 'required|boolean',
            'availability'  => 'required|string',
        ];
    }
}
