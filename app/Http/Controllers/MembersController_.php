<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\members;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $arr['members'] = Members::all();
        return view('admin.members.index')->with($arr);
    }
}
