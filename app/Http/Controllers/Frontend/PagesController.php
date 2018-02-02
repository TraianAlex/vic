<?php

namespace App\Http\Controllers\Frontend;

use App\Link;
use App\Category;
use App\Jobs\Tracker;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{

    public function __construct()
    {
        dispatch(new Tracker);
    }

    public function __invoke()
    {
        $page = request()->segment(1) ?? 'index';
        return view()->exists("pages/$page") ? view("pages/$page") : view("pages/index");
    }

    public function link()
    {
        $links = Link::with('categories')->latest()->paginate(20);
        $categories = Cache::remember('categories', 60*24*7, function(){
            return Category::all();
        });
        return view('pages.links', compact( 'links', 'categories'));
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
        return view('pages.links', compact('links'));
    }

    public function all()
    {
        $links = Link::with('categories')->latest()->paginate(2000);
        return view('pages.links', compact('links'));
    }

    public function sendEmail(Request $request)
    {
        Mail::to('victor_traian@yahoo.com')
            ->queue(new ContactForm($request->name, $request->email, $request->message));
        echo "Thanks for filling out form!";//flash('Thanks for filling out the form!');//return back();
    }

    public function loadGrid()
    {
        $url = Storage::url('image.x');
        if (file_exists(getcwd().$url)) {
            return file_get_contents(getcwd().$url);
        }
    }

    // public function saveDraw(Request $request)
    // {
    //     $url = Storage::url('image.x');
    //     file_put_contents($url, json_encode($_POST));
    //     return back();
    //     //file_exist(storage_path('app/public'));
    //     //\File::put(storage_path('app/public/storage/image.x'), json_encode($_POST));
    //     //\File::delete(storage_path('app/public/storage/image.x'));
    // }
}
