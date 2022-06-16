<?php

namespace App\Http\Resources\Payment;

use App\Models\Employee;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'ref_no' => $this->ref_no,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'status' => $this->status,
            'loan_repay' => $this->loan_repay,
            'date_paid' => $this->date_paid,
            'employee' => Employee::whereId($this->employee_id)->first()->makeHidden(['created_at', 'updated_at', 'delete_at'])
        ];
    }
}
