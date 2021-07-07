<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pay_method;
use App\Models\payments;
use App\Models\receipts;
use Illuminate\Http\Request;

class receiptsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $arr['receipts'] = receipts::all();
        return view('admin.receipts.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['pay_method'] = Pay_method::all();
        return view('admin.receipts.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, receipts $receipts)
    {
        $receipts->subaccountcode = $request->subaccountcode;
        $receipts->amount_paid = $request->amount_paid;
        $receipts->account_no = $request->account_no;
        $receipts->method_pay = $request->method_pay;
        $receipts->paid_by = $request->paid_by;
        $receipts->naration = $request->naration;
        $receipts->posted_by = $request->posted_by;
        $receipts->save();

        $m = 'The record for ' . strtoupper($receipts->paid_by). '  has been Successfully Saved to the Database.' ;
        // Session::flash('statuscode','info');
         return back()->with('message', $m);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
