<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Loan\StoreLoanRequest;
use App\Http\Requests\Loan\UpdateLoanRequest;
use App\Http\Resources\Loan\LoanResource;
use App\Models\Employee;
use App\Models\Loan;
use App\Models\LoanDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::orderBy('id')->paginate(5);

        return LoanResource::collection($loans);
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
    public function store(StoreLoanRequest $request)
    {
        $data = $request->validated();

        $loan = Loan::create($data);

        $this->calAmountLoan($loan->employee_id);

        return new LoanResource($loan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loan = Loan::whereId($id)->first();

        if ($loan) {
            return new LoanResource($loan);
        } else {
            return response(['message' => 'Data not found!!']);
        }
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
    public function update(UpdateLoanRequest $request, $id)
    {
        $data = $request->validated();

        $loan = Loan::whereId($id)->first();

        if ($loan) {
            $loan->update($data);
            $this->calAmountLoan($loan->employee_id);
            return new LoanResource($loan);
        } else {
            return response(['message' => 'Data not found!!']);
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
        $loan = Loan::whereId($id)->first();
        if ($loan) {

            $loan->delete();
            $this->calAmountLoan($loan->employee_id);
            return response(['message' => 'Loan has been deleted.']);
        } else {
            return response(['message' => 'Data not found !!']);
        }
    }

    private function calAmountLoan($employee_id)
    {
        $sum = DB::table('loans')->where('employee_id', $employee_id)->select(DB::raw('sum(cast(amount as float))'))->first();

        $loan_details = LoanDetails::where('employee_id', $employee_id);

        if ($loan_details->exists()) {

            $loan_details->update(['amount' => $sum->sum]);
        } else {
            $loan_details = new LoanDetails();
            $loan_details->employee_id = $employee_id;
            $loan_details->amount = $sum->sum;
            $loan_details->save();
        }
    }
}
