<?php

namespace App\Http\Controllers;

use App\Link;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
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

    public function link()
    {
        //$links = Link::paginate(20);
        $categories = Category::all();
        return view('pages.links', compact('categories'));//,compact('links')
    }

    public function result(Category $category)
    {
        $links = $category->links()->get();
        return view('pages.resources', compact('links'));
    }

    public function demo()
    {
        return view('pages.demos');
    }
}
