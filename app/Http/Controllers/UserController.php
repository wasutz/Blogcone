<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    { 
        $this->middleware('auth'); 
        $this->middleware('admin', ['only' => ['updateRole']]);   
    }

    public function getAccount($id)
    {
        $user = User::findOrFail($id);

        return view('auth.account')->with('user', $user);
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role_id = $request->role_id;
        $user->save();

        return back()->with('info', 'Update Role Successful.');
    }
}