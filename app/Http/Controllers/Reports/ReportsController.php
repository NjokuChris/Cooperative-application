<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\branch_location;
use App\Models\members;
use App\Models\Loans;
use App\Models\Accounts;
use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $company_id = $request->company_id;

        $query = members::where('member_status','1');

        if ($member_name)
            $query->where('member_name', $member_name);

        if ($member_no)
            $query->where('member_no', $member_no);

        if ($savings_amount)
            $query->where('savings_amount','>=', $savings_amount);

        if ($location)
            $query->where('locationID', $location);

        if ($gender)
            $query->where('gender', $gender);

        if ($bank)
            $query->where('BankID', $bank);

        if ($date_from)
            $query->where('joined_date','>=', $date_from);

        if ($date_to)
            $query->where('joined_date','<=', $date_to);

        if ($company_id)
            $query->where('company_id', $company_id);


        $members = $query->get();

       // $members = members_views::get();
        return view('reports.members.member_reports', ['members' => $members]);
    }

    public function MembersSearch()
    {
        $arr['branch'] = branch_location::all();
        $arr['bank'] = Accounts::where('acc_trans_type_id', 3)->get();
        $arr['company'] = company::where('status', 'Active')->get();
        return view('reports.members.members_search')->with($arr);
    }

    public function LoansSearch()
    {
        $arr['branch'] = branch_location::all();
        $arr['bank'] = Accounts::where('pay_method_id', 2)->get();
        return view('reports.loans.loans_search')->with($arr);
    }

    public function LoansReport(Request $request)
    {
        $member_name = $request->member_name;
        $member_no = $request->member_no;
        $savings_amount = $request->savings_amount;
        $location = $request->locationID;
        $gender = $request->gender;
        $bank = $request->BankID;
        $date_from = $request->date_from;
        $date_to = $request->date_to;

        $query = Loans::orderBy('id', 'desc');

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


        $loans = $query->get();

       // $members = members_views::get();
        return view('reports.loans.loans_report', ['loans' => $loans]);
    }

    public function DepositSearch()
    {
        $arr['branch'] = branch_location::all();
        $arr['bank'] = Accounts::where('pay_method_id', 2)->get();
        return view('reports.deposit.deposit_search')->with($arr);
    }

    public function DepositReport(Request $request)
    {
        $member_name = $request->member_name;
        $member_no = $request->member_no;
        $savings_amount = $request->savings_amount;
        $location = $request->locationID;
        $gender = $request->gender;
        $bank = $request->BankID;
        $date_from = $request->date_from;
        $date_to = $request->date_to;

        $query = Loans::orderBy('id', 'desc');

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


        $loans = $query->get();

       // $members = members_views::get();
        return view('reports.deposit.deposit_report', ['deposit' => $loans]);
    }

    public function withdrawerSearch()
    {
        $arr['branch'] = branch_location::all();
        $arr['bank'] = Accounts::where('pay_method_id', 2)->get();
        return view('reports.withdrawers.withdrawer_search')->with($arr);
    }

    public function withdrawerReport(Request $request)
    {
        $member_name = $request->member_name;
        $member_no = $request->member_no;
        $savings_amount = $request->savings_amount;
        $location = $request->locationID;
        $gender = $request->gender;
        $bank = $request->BankID;
        $date_from = $request->date_from;
        $date_to = $request->date_to;

        $query = Loans::orderBy('id', 'desc');

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


        $loans = $query->get();

       // $members = members_views::get();
        return view('reports.withdrawers.withdrawer_report', ['deposit' => $loans]);
    }

    public function MarginSearch()
    {
        $arr['branch'] = branch_location::all();
        $arr['bank'] = Accounts::where('pay_method_id', 2)->get();
        return view('reports.margin.margin_search')->with($arr);
    }

    public function MarginReport(Request $request)
    {
        $member_name = $request->member_name;
        $member_no = $request->member_no;
        $savings_amount = $request->savings_amount;
        $location = $request->locationID;
        $gender = $request->gender;
        $bank = $request->BankID;
        $date_from = $request->date_from;
        $date_to = $request->date_to;

        $query = Loans::orderBy('id', 'desc');

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


        $loans = $query->get();

       // $members = members_views::get();
        return view('reports.margin.margin_report', ['deposit' => $loans]);
    }

    public function ReceiptsSearch()
    {
        $arr['branch'] = branch_location::all();
        $arr['bank'] = Accounts::where('pay_method_id', 2)->get();
        return view('reports.receipts.receipts_search')->with($arr);
    }

    public function ReceiptsReport(Request $request)
    {
        $member_name = $request->member_name;
        $member_no = $request->member_no;
        $savings_amount = $request->savings_amount;
        $location = $request->locationID;
        $gender = $request->gender;
        $bank = $request->BankID;
        $date_from = $request->date_from;
        $date_to = $request->date_to;

        $query = Loans::orderBy('id', 'desc');

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


        $loans = $query->get();

       // $members = members_views::get();
        return view('reports.receipts.receipts_report', ['deposit' => $loans]);
    }
}
