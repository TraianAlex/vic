<?php

namespace App\Http\Controllers;

use App\Jobs\Tracker;
use Illuminate\Http\Request;
use App\Events\UserHasRegistered;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        dispatch(new Tracker);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        event(new UserHasRegistered(auth()->user()));
        return view('pages.home');
    }
}
