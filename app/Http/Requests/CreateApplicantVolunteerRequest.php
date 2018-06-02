<?php

namespace App\Http\Requests;

class CreateApplicantVolunteerRequest extends Request
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
            'jobStudy'      => 'nullable|string',
            'aboutMe'       => 'required|string',
            'driverLicense' => 'required|boolean',
            'offerRoom'     => 'required|boolean',
            'availability'  => 'required|string',
        ];
    }
}
