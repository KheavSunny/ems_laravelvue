<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\StorePaymentRequest;
use App\Http\Requests\Payment\UpdatePaymentRequest;
use App\Http\Resources\Payment\PaymentResource;
use App\Models\LoanDetails;
use App\Models\Payment;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::orderBy('id')->paginate(5);

        return PaymentResource::collection($payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        $data = $request->validated();

        $payment = Payment::create($data);

        return $this->show($payment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::whereId($id)->first();

        return new PaymentResource($payment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, $id)
    {
        $data = $request->validated();

        $payment = Payment::whereId($id)->first();

        if ($payment) {
            $payment->update($data);
            $this->loan_repay($payment->employee_id);
            return new PaymentResource($payment);
        } else {
            return response(['message' => 'Data not found !!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::whereId($id)->first();

        if ($payment) {
            $payment->delete();
            $this->loan_repay($payment->employee_id);
            return response(['message' => 'Payment has been deleted !!']);
        } else {
            return response(['message' => 'Data not found !!!']);
        }
    }

    public function paid($id)
    {

        $payment = Payment::whereId($id)->first();


        // return $loan;

        if ($payment->status == false) {
            $payment->update([
                'status' => true,
                'loan_repay' => request()->loan_repay >= 0 ? request()->loan_repay : 0
            ]);

            $this->loan_repay($payment->employee_id);

            return $payment;
        } else {
            return response(['message' => 'This payment already paid !!']);
        }
    }

    private function loan_repay($id)
    {
        $loan = LoanDetails::where('employee_id', $id)->first();

        if ($loan) {
            $repay = DB::table('payments')->where('employee_id', $id)->select(DB::raw('sum(cast(loan_repay as double precision))'))->first();
            $loan->update(['repay' => $repay->sum]);
        }

        return $loan;
    }
}
