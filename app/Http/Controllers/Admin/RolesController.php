<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->get();
        return view('admin.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role)
    {

        //validate the role fields
        $request->validate([
            'name' => 'required|unique:roles,name'

        ]);

        //dd($request);

        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->save();

        $listofPermissions = explode(',', $request->role_permissions);//create array from seperated/comma
       // dd($listofPermissions);

        foreach ($listofPermissions as $key => $value) {
            $permission = new Permission();
            $permission->name = $value;
            $permission->slug = strtolower(str_replace(" ", "-", $value));
            $permission->save();
            $role->permissions()->attach($permission->id);
            $role->save();
        }

        return redirect('/admin/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show',['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', ['role' => $role]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'

        ]);

        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->save();

        return redirect('/admin/roles');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //$role->permissions()->delete();
        $role->delete();
        $role->permissions()->detach();

        return redirect('/admin/roles');
    }
}
