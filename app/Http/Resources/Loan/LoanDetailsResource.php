<?php

namespace App\Http\Resources\Loan;

use App\Models\Employee;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanDetailsResource extends JsonResource
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
            'employee' => Employee::whereId($this->employee_id)->first()->makeHidden(['created_at', 'updated_at', 'delete_at']),
            'amount' => $this->amount,
            'repay' => $this->repay,
            'remain' => $this->remain,
        ];
    }
}
