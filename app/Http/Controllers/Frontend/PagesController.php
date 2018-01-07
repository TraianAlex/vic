<?php

namespace App\Http\Controllers\Frontend;

use App\Link;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\Tracker;

class PagesController extends Controller
{

    public function __construct()
    {
        dispatch(new Tracker);
    }

    public function landing()
    {
        return view('pages/index');
    }

    public function about()
    {
        return view('pages/about');
    }

    public function contact()
    {
        return view('pages/contact');
    }

    public function services()
    {
        return view('pages/services');
    }

    public function link()
    {
        $links = Link::paginate(20);
        $categories = Category::all();
        return view('pages.links', compact( 'links', 'categories'));//compact('links')
    }

    public function countLink(Request $request, $id)
    {
        $links = Link::findOrFail((int)$request->id);
        $visits = $links->visits;
        $links->visits = $visits + 1;
        $links->save();
        return redirect($links->address);
    }

    public function demo()
    {
        return view('pages.demos');
    }

    public function result(Category $category)
    {
        $links = $category->links()->paginate(15);
        return view('pages.resources', compact('links'));
    }

    public function all()
    {
        $links = Link::paginate(2000);
        return view('pages.resources', compact('links'));
    }
}
