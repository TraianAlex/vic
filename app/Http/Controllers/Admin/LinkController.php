<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Link;
use Pusher\Pusher;
use App\Events\LinkCreated;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Notifications\LinkUpdated;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Notifications\LinkPublished;
use App\Http\Requests\CreateLinkRequest;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - link';
        $links = Link::latest()->paginate(15);
        return view('link.index',compact('links','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - link';
        $categories = \App\Category::pluck('name', 'id');
        return view('link.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(CreateLinkRequest $request)
    {
        $link = new Link();
        $link->address = $request->address;
        $link->description = $request->description;
        $link->save();
        $link->assignCategory(!$request->input('cat_list') ? [] : $request->input('cat_list'));
        flash('Your link has been created!');

        admins()->user()->notify(new LinkPublished($link));
        event(new LinkCreated(admins()->user(), $link));

        // $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'),[]);//$pusher = App::make('pusher');
        // $pusher->trigger('test-channel', 'App\Events\LinkCreated',
        //                 ['message' => "A new link has been created at<br>
        //                     <a href=".url('/links/'. $link->id)." target='_blank'>"
        //                     .url('/links/'. $link->id)."</a>"]);
        return redirect('link');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $title = 'Show - link';
        if($request->ajax())
        {
            return URL::to('link/'.$id);
        }
        $link = Link::findOrfail($id);
        return view('link.show',compact('title','link'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $title = 'Edit - link';
        if($request->ajax())
        {
            return URL::to('link/'. $id . '/edit');
        }
        $link = Link::findOrfail($id);
        $categories = \App\Category::pluck('name', 'id');
        return view('link.edit',compact('title','link', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $link = Link::findOrfail($id);
        $request->validate([
            'address' => [
                'required',
                Rule::unique('links')->ignore($link->id),
            ],
            'description' => 'sometimes|max:255'
        ]);
        $link->address = $request->address;
        $link->description = $request->description;
        $link->save();
        $link->categories()->sync(
            !$request->input('categories_list') ? [] : $request->input('categories_list'));
        flash('Your link has been updated!');
        admins()->user()->notify(new LinkUpdated($link));
        return redirect('link');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id, Request $request)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/link/'. $id . '/delete');
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
     	$link = Link::findOrfail($id);
        $link->categories()->detach();
     	$link->delete();
        flash('Your link has been deleted!');
        return URL::to('link');
    }
}
