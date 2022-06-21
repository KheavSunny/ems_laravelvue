<?php

namespace App\Http\Resources\Payment;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    private function attendance($dateFrom, $dateTo, $id)
    {
        // $attendance = Attendance::whereBetween('date', [$dateFrom, $dateTo])->where('employee_id', $id)->get();
        $attendance = DB::table('attendances')
            ->whereBetween('date', [$dateFrom, $dateTo])
            ->where('employee_id', $id)
            ->select(DB::raw('sum(cast(t as double precision))'))
            ->first();

        return $attendance;
    }



    public function toArray($request)
    {
        $sum = $this->attendance($this->date_from, $this->date_to, $this->employee_id)->sum;
        return [
            'id' => $this->id,
            'ref_no' => $this->ref_no,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'status' => $this->status,
            'loan_repay' => $this->loan_repay,
            'date_paid' => $this->date_paid,
            'working_day' => $sum,
            'subtotal' => $sum * 20,
            'employee' => Employee::whereId($this->employee_id)->first()->makeHidden(['created_at', 'updated_at', 'delete_at'])
        ];
    }
}
