<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;


use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index' ,$users) ->with('users', $users);
    }

    public function edit($id)
    {
        $role_admin  = Role::where('name', 'Admin')->first();
        $curr_user = User::find($id);
        $curr_user->roles()->attach($role_admin);

        return redirect('users');
    }
}
