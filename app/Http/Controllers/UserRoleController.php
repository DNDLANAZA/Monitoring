<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserRoleController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index()
    {
        $rus = UserRole::all();
        return view('superadmin.role_user.roleuser', compact( 'rus' ));
    }

    public function create()
    {
        $users = User::all();
        $roles = Role::all();

        return view('superadmin.role_user.newRoleUser', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate( [
            'user_id' => 'required',
            'role_id' => 'required',
        ] );

        $data = [
            'user_id' => $request->user_id,
            'role_id' => $request->role_id
        ];

        UserRole::create($data);

        DB::table('role_user')->insert([
            'user_id' => $request->user_id,
            'role_id' => $request->role_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return Redirect::to('role-user')->with( 'status', 'User role has created with success 👌😎!!' );
    }

    public function show($id)
    {
        $rus = UserRole::find($id);

        return view('superadmin.role_user.viewRoleUser', compact('rus'));
    }


    public function edit($id)
    {
        $rus = UserRole::find( $id );
        $users = User::all();
        $roles = Role::all();
        return view('superadmin.role_user.editRoleUser', compact('rus','users','roles'));
    }

    public function update(Request $request, $id)
    {
        DB::table('role_user')->where('id', '=', $id)->update([
            'user_id' => $request->user_id,
            'role_id' => $request->role_id,
            'updated_at' => Carbon::now()
        ]);
        $rus = UserRole::find($id);
        $rus->user_id = $request->user_id;
        $rus->role_id = $request->role_id;
        $rus->save();

        return Redirect::to('role-user')->with( 'status', 'Updated Successfully👍👍!!' );
    }

    public function destroy($id)
    {
        DB::table('role_user')->where('id', $id)->delete();

        $rus = UserRole::find( $id );
        $rus->delete();

        return Redirect::to('role-user')->with( 'status', 'Deleted Successfully👍👍!!' );
    }
}
