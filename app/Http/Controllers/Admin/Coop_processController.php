<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accounts_year;
use App\Models\Coop_process;
use App\Models\Payrollheaders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Coop_processController extends Controller
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
        $coop_process = Coop_process::orderBy('id', 'desc')->get();
        return view('admin.entries.index', ['coop_process' => $coop_process]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['year'] = Accounts_year::all();
       // $arr['payroll'] = Payrollheaders::where('publish_id','2')->get();
        return view('admin.entries.create')->with($arr);
    }

    public function getPayrollMonth(Request $request)
    {
        $payrollMonth = DB::table("payrollheaders")
        ->where("year_id",$request->year_id)
        ->where("publish_id",'2')
        ->whereNotIn('payroll_id', DB::table('coop_process')->pluck('payroll_id'))
        ->pluck("period_description","payroll_id");
        return response()->json($payrollMonth);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Coop_process $coop_process)
    {
        //code to insert in coop_process table and execute procedure.

      //  dd($request);

      // DB::enableQueryLog();

        DB::beginTransaction();

        try{
        $coop_process->payroll_id = $request->payroll_id;
        $coop_process->transID = 2;
        $coop_process->processed_by = Auth::user()->id;
        $coop_process->save();

        DB::statement("execute proc_coop_process $request->payroll_id ");

        DB::commit();

        //return redirect("admin/coop_process/{$coop_process->payroll_id}")->with('message', 'Loan Application Booked Successfully!');
       return back()->with('message', 'Transaction Successful');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('message2', 'Transaction failled');
       }

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
