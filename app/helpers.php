<?php

//Auth::guard('admins')->//auth()->guard('admins')->(['email' => '', 'password' => ''])
////auth()->guard('admins')
function admins()
{
    return auth()->guard(config('auth.defaults.admin_guard'));
}
