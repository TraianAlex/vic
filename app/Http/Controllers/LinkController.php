<?php

namespace App\Http\Controllers;

use URL;
use App\Link;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLinkRequest;

/**
 * Class LinkController.
 *
 * @author  The scaffold-interface created at 2017-12-04 04:11:03pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
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
        $links = Link::paginate(15);
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

        $pusher = App::make('pusher');
        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new link has been created !!']);
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
            'description' => 'sometimes|max:191'
        ]);
        $link->address = $request->address;
        $link->description = $request->description;
        $link->save();

        $link->categories()->sync(
            !$request->input('categories_list') ? [] : $request->input('categories_list'));

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
        return URL::to('link');
    }
}
