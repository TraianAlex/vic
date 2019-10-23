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
        $captcha = $this->generateChallenge();
        return view()->exists("pages/$page") ? view("pages/$page", compact('captcha')) : view("pages/index");
    }
    public function link()
    {
        $links = Link::with('categories')->latest()->paginate(20);
        $categories = Cache::remember('categories', 60*24*7, function () {
            return Category::all();
        });
        return view('pages.links', compact('links', 'categories'));
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
        $captcha = (int)$request->get('s_q');
        if ($this->validate_email($captcha)) {
            Mail::to('victor_traian@yahoo.com')
                ->queue(new ContactForm($request->name, $request->email, $request->message));
            echo "Thanks for filling out form!";//flash('Thanks for filling out the form!');//return back();
        } else {
            echo "You must provide a correct answer!";
        }
    }
    public function loadGrid()
    {
        $url = Storage::url('image.x');
        if (file_exists(getcwd().$url)) {
            return file_get_contents(getcwd().$url);
        }
    }
    private function validate_email($resp)
    {
        $val = (int)session('challenge');
        session(['challenge' => null]);
        if ($resp !== $val) {
            return false;
        }
        return true;
    }
    private function generateChallenge()
    {
        $numbers = [mt_rand(1, 4), mt_rand(1, 4)];
        session(['challenge' => $numbers[0] + $numbers[1]]);
        $converted = array_map('ord', $numbers);
        return "<input type=\"text\" name=\"s_q\" class=\"form-control input\"
      placeholder='&#87;&#104;&#97;&#116;&#32;&#105;&#115;&#32;
      &#$converted[0];&#32;&#43;&#32;&#$converted[1];&#63;'>";
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
