<?php

namespace App\Http\Requests;

class CreateApplicantAdultRequest extends Request
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
            'name'                   => 'required|string',
            'age'                    => 'required|integer',
            'email'                  => 'required|email',
            'mobileNumber'           => 'required|string',
            'allergies'              => 'nullable|string',
            'teacherName'            => 'required|string',
            'teacherMobileNumber'    => 'required|string',
            'participateMasterclass' => 'required|boolean',
            'participateConsert'     => 'required|boolean',
            'toPlayOnMasterClass'    => 'nullable|string',
            'toPlayOnConcert'        => 'nullable|string',
        ];
    }
}
