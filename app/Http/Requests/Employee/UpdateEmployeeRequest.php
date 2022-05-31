<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => 'string',
            'lastname' => 'string',
            'phone' => 'digits_between:9,10|unique:employees,phone',
            'department_id' => 'numeric',
            'state_id' => 'numeric',
            'city_id' => 'numeric',
            'country_id' => 'numeric',
            'zip_code' => 'string',
            'address' => 'string',
            'birthdate' => 'string',
            'date_hired' => 'string'
        ];
    }
}
