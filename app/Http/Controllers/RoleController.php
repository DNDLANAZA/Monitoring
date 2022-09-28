<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index()
    {
        $roles = Role::all();
        return view('superadmin.roles.role', compact( 'roles' ));
    }

    public function create()
    {
        return view('superadmin.roles.newRole');
    }

    public function store(Request $request)
    {
        $request->validate( [
            'name' => 'required',
        ] );

        $data = [
            'name' => $request->name
        ];

        Role::create($data);

        return Redirect::to('roles')->with( 'status', 'Role has created with success 👌😎!!' );
    }

    public function show($id)
    {
        $roles = Role::find($id);
        return view('superadmin.roles.viewRole', compact('roles'));
    }

    public function edit($id)
    {
        $roles = Role::find( $id );
        return view('superadmin.roles.editRole', compact('roles'));
    }

    public function update(Request $request, $id)
    {
        $roles = Role::find($id);
        $roles->name = $request->name;

        $roles->save();

        return Redirect::to('roles')->with( 'status', 'Updated Successfully👍👍!!' );
    }

    public function destroy($id)
    {
        $roles = Role::find( $id );
        $roles->delete();

        return Redirect::to('roles')->with( 'status', 'Deleted Successfully👍👍!!' );
    }
}
