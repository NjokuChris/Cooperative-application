<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\branch_location;
use App\Models\members_views;
use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function MembersReport(Request $request)
    {
      // dd($request);
        $member_name = $request->member_name;
        $member_no = $request->member_no;
        $savings_amount = $request->savings_amount;
        $location = $request->locationID;
        $gender = $request->gender;
        $bank = $request->BankID;
        $date_from = $request->date_from;
        $date_to = $request->date_to;

        $query = DB::table('members_view');

        if ($member_name)
            $query->where('member_name', $member_name);

        if ($member_no)
            $query->where('member_no', $member_no);

        if ($savings_amount)
            $query->where('savings_amount', $savings_amount);

        if ($location)
            $query->where('locationID', $location);

        if ($gender)
            $query->where('gender', $gender);

        if ($bank)
            $query->where('BankID', $bank);

          //  if ($date_from)
           // $query->where('BankID', $bank);

            //if ($bank)
            //$query->where('BankID', $bank);


        $members = $query->get();

       // $members = members_views::get();
        return view('reports.members.member_reports', ['members' => $members]);
    }

    public function MembersSearch()
    {
        $arr['branch'] = branch_location::all();
        $arr['bank'] = Accounts::where('pay_method_id', 2)->get();
        return view('reports.members.members_search')->with($arr);
    }
}
