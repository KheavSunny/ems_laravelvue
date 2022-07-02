<?php

namespace App\Http\Requests\Attendance;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionAbsentRequest extends FormRequest
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
            'employee_id' => 'required',
            'date_from' => 'required|string',
            'date_to' => 'required|string',
            'note' => 'nullable',
            'status' => 'in:absent,permission',
            'half_or_full' => 'required|in:2,4'
        ];
    }
}
