<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $userPath = '/';

    protected $adminPath = '/admin';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function authenticated($request, $user)
    {
        if($user->role_id === config('roles.admin')) {
            return redirect()->intended($this->adminPath);
        }

        return redirect()->intended($this->userPath);
    }
}
