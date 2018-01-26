<?php

namespace App\Http\Controllers\Frontend;

use App\Jobs\Tracker;
use Illuminate\Http\Request;
use App\Events\UserHasRegistered;
use App\Http\Controllers\Controller;

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
        return view('pages.home');
    }

    public function createDraw()
    {
        //put a (user_id).x file in storage/draw folder or use db
        //permit access only for this user for that file
        //create the get and save methods
    }
}
