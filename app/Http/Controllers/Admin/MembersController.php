<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\branch_location;
use App\Models\company;
use Illuminate\Http\Request;
use App\Models\members;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Date;

class MembersController extends Controller
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
        $arr['members'] = Members::all();
        return view('admin.members.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['company'] = company::all();
        $arr['branch'] = branch_location::all();
        return view('admin.members.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, members $member)
    {


        if(isset($request->photo) && $request->photo->getClientOriginalName()){
            $ext = $request->photo->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->photo->storeAs('public/photo',$file);
        }
        else
        {
            $file = '';
        }

       $member->member_no = $request->member_no;
       $member->firstName = $request->firstName;
       $member->middleName = $request->middleName;
       $member->surName = $request->surName;
       $member->member_name = strtoupper($member->surName).' '. strtoupper($member->firstName) . ' ' . strtoupper($member->middleName) ;
       $member->savings_amount = $request->savings_amount;
       $member->posted_date = $request->posted_date;
       $member->LocationID = $request->LocationID;
       $member->joined_date = $request->joined_date == null ? null : date(' Y-m-d', strtotime($request->joined_date));
       $member->H_address = $request->H_address;
       $member->email = $request->email;
       $member->phoneNo = $request->phoneNo;
       $member->is_staff = $request->is_staff;
       $member->employee_no = $request->employee_no;
       $member->company = $request->company;
       $member->date_birth = $request->date_birth == null ? null : date(' Y-m-d', strtotime($request->date_birth));
       $member->gender = $request->gender;
       $member->Home_location = $request->Home_location;
       $member->H_state = $request->H_state;
       $member->BankID = $request->BankID;
       $member->BankAcc_no = $request->BankAcc_no;
       $member->photo = $file;
       $member->posted_by = $request->posted_by;
       $member->title = $request->title;
       $member->save();


       $m = 'The record for ' . strtoupper($member->surName).' '. strtoupper($member->firstName) . ' ' . strtoupper($member->middleName) . ' has been Successfully Saved to the Database.' ;
      // Session::flash('statuscode','info');
       return back()->with('message', $m);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function show($member_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function edit(members $member)
    {
        //echo $member->title;
       $arr['member'] = $member;
       $arr['company'] = company::all();
       return view('admin.members.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, members $member)
    {



        if(isset($request->photo) && $request->photo->getClientOriginalName()
        ){
            $ext = $request->photo->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->photo->storeAs('public/photo',$file);
        }
        else
        {
            if(!$member->photo)
                $file = '';
            else
                $file = $member->photo;
        }
        $member->member_no = $request->member_no;
        $member->firstName = $request->firstName;
        $member->middleName = $request->middleName;
        $member->surName = $request->surName;
        $member->member_name = strtoupper($member->surName).' '. strtoupper($member->firstName) . ' ' . strtoupper($member->middleName) ;
        $member->savings_amount = $request->savings_amount;
        $member->posted_date = $request->posted_date;
        $member->LocationID = $request->LocationID;
        $member->joined_date = $request->joined_date == null ? null : date(' Y-m-d', strtotime($request->joined_date));
        $member->H_address = $request->H_address;
        $member->email = $request->email;
        $member->phoneNo = $request->phoneNo;
        $member->is_staff = $request->is_staff;
        $member->employee_no = $request->employee_no;
        $member->company = $request->company;
        $member->date_birth = $request->date_birth == null ? null : date(' Y-m-d', strtotime($request->date_birth));
        $member->gender = $request->gender;
        $member->Home_location = $request->Home_location;
        $member->H_state = $request->H_state;
        $member->BankID = $request->BankID;
        $member->BankAcc_no = $request->BankAcc_no;
        $member->photo = $file;
        $member->posted_by = $request->posted_by;
        $member->title = $request->title;
        $member->save();
        return redirect('admin/members');
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
