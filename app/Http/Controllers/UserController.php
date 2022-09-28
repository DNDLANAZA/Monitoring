<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();

        return view('superadmin.users.user', compact('users'));
    }

    public function create()
    {
        return view('superadmin.users.newUser');
    }

    public function store(StoreUserRequest $request)
    {

        $empData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::create($empData);

        return Redirect::to('users')->with( 'status', 'Team has created success 👌😎!!' );
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('superadmin.users.viewUser', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('superadmin.users.editUser', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return Redirect::to('users')->with( 'status', 'Updated Successfully👍👍!!' );
    }

    public function destroy($id)
    {
        $user = User::find( $id );
        $user->delete();

        return Redirect::to('users')->with( 'status', 'Deleted Successfully👍👍!!' );
    }
}
