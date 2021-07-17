<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, user $user)
    {
        //validate the fields
        $request->validate([
            'name' => 'required max:255',
            'email' => 'required|unique:users|email',
            's_name' => 'required max:255',
            'f_name' => 'required',
            'm_name' => 'required',
            'password' => 'required|between:8,255|confirmed',
            'password_confirmation' =>'required'

        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->s_name = $request->s_name;
        $user->f_name = $request->f_name;
        $user->m_name = $request->m_name;
        $user->is_member = $request->is_member == null ? 0 : $request->is_member;

        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {

        return view('admin.users.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {

        return view('admin.users.edit', ['user'=>$user]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $request->validate([
            'name' => 'required max:255',
            'email' => 'required|unique:users|email',
            's_name' => 'required max:255',
            'f_name' => 'required',
            'm_name' => 'required',
            'password' => 'required|between:8,255|confirmed',
            'password_confirmation' =>'required'

        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->s_name = $request->s_name;
        $user->f_name = $request->f_name;
        $user->m_name = $request->m_name;
        $user->is_member = $request->is_member == null ? 0 : $request->is_member;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();

        return redirect('/admin/users');
    }
}
