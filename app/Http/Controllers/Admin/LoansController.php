<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loans;
use App\Models\Loans_schedule;
use App\Models\Members;
use App\Models\members_views;
use App\Models\Loans_type;
use App\Models\period;
use Illuminate\Support\Facades\DB;


class LoansController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['loans'] = loans::all();
        return view('admin.loans.index')->with($arr);

        //return view('admin.loans.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['loans_type'] = Loans_type::all();
        $arr['period'] = period::select(['period_id','period_description'])
        ->where('status', '1')->get();
        return view('admin.loans.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Loans $loans)
    {
        $loans->members_id = $request->members_id;
        $loans->loanamount = $request->loanamount;
        $loans->tenor = $request->tenor;
        $loans->interest_rate = $request->interest_rate;
        $loans->inerestamount = $request->inerestamount;
        $loans->monthlydeduction = $request->monthlydeduction;
        $loans->total_payable_amount = '10000';
        $loans->loan_type_id = $request->loan_type_id;
        $loans->paystartperiod_id = '200';
        $loans->payendperiod_id = '205';
        $loans->transID = '2';
        $loans->save();

        DB::select("call Proc_loans_schedule($loans->id)");

        return redirect("admin/loans/{$loans->id}")->with('message', 'Loan Application Booked Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$arr['loans'] = $loans;
        //echo($id);
        $arr['loans_schedule'] = Loans_schedule::select(['payroll_id','period_description','amount2debit'])
        ->where('loans_id', $id)->get();
        return view('admin.loans.show', ['loans' => loans::findOrFail($id)])->with($arr);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getMember()
    {
        $m=members_views::all();

        return response()->json($m);
    }
    }
