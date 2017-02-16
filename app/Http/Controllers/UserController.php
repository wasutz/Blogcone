<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function __construct()
    { 
        $this->middleware('admin', ['only' => ['updateRole']]);   
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role_id = $request->role_id;
        $user->save();

        return  redirect()->back()
        				  ->with('info', 'Update Role Successful.');
    }
}