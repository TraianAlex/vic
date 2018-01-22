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

    public function __invoke(Request $request)
    {
        $page = $request->segment(1) ?? 'index';
        return view("pages/$page");
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
