<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Loans;
use App\Models\Members;
use App\Models\members_views;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      //  $member = Members::orderBy('id', 'desc')->get();

    // dd(Auth::user());

        $arr['member'] = members_views::where('member_id',  Auth::user()->member_id )->first();
       $arr['loans'] = Loans::where([
             'members_id' =>  Auth::user()->member_id,
             'pay_status' => 1
             ])->get();


       return view('user.dashboard')->with($arr);
    }

}
