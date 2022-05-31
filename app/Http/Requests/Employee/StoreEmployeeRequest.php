<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|digits_between:9,10|unique:employees',
            'department_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'zip_code' => 'required|string',
            'address' => 'string',
            'birthdate' => 'string',
            'date_hired' => 'string'
        ];
    }
}
