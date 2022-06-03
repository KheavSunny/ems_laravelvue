<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'middlename' => $this->middlename,
            'department_id' => $this->department_id,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
            'country_id' => $this->country_id,
            'zip_code' => $this->zip_code,
            'birthdate' => $this->birthdate,
            'date_hired' => $this->date_hired,
            'address' => $this->address,
            'phone' => $this->phone,
        ];
    }
}
