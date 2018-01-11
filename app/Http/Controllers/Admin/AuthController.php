<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(LoginAdminRequest $request)
    {
        if(!admins()->attempt(['name' => $request['name'], 'password' => $request['password']])){
            flash()->overlay('These credentials do not match our records!', 'Sorry!');
            return redirect()->back();//->with('fail', 'Could not be log you in!');
        }
        return redirect('admin');
    }

    public function logout()
    {
        admins()->logout();
        flash('You are logged out!');
        return redirect('/adm/login');
    }
}
