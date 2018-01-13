<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class PageController.
 *
 * @author  The scaffold-interface created at 2018-01-11 03:51:16pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - page';
        $pages = Page::paginate(6);
        return view('page.index',compact('pages','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - page';

        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page();


        $page->page = $request->page;



        $page->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new page has been created !!']);

        return redirect('page');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - page';

        if($request->ajax())
        {
            return URL::to('page/'.$id);
        }

        $page = Page::findOrfail($id);
        return view('page.show',compact('title','page'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - page';
        if($request->ajax())
        {
            return URL::to('page/'. $id . '/edit');
        }


        $page = Page::findOrfail($id);
        return view('page.edit',compact('title','page'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $page = Page::findOrfail($id);

        $page->page = $request->page;


        $page->save();

        return redirect('page');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/page/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$page = Page::findOrfail($id);
     	$page->delete();
        return URL::to('page');
    }
}
