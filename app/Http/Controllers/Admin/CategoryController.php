<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Category;
use Pusher\Pusher;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

/**
 * Class CategoryController.
 *
 * @author  The scaffold-interface created at 2017-12-04 04:09:59pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - category';
        $categories = Category::paginate(15);
        return view('category.index',compact('categories','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - category';
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        flash('Your category has been created!');
        //$pusher = App::make('pusher');
        $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'),[]);
        $pusher->trigger('test-channel', 'App\Events\LinkCreated',
                        ['message' => 'A new category has been created !!']);
        return redirect('category');
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
        $title = 'Show - category';
        if($request->ajax())
        {
            return URL::to('category/'.$id);
        }
        $category = Category::findOrfail($id);
        return view('category.show',compact('title','category'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $title = 'Edit - category';
        if($request->ajax())
        {
            return URL::to('category/'. $id . '/edit');
        }
        $category = Category::findOrfail($id);
        return view('category.edit',compact('title','category'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = Category::findOrfail($id);
        $category->name = $request->name;
        $category->save();
        flash('Your category has been updated!');
        return redirect('category');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/category/'. $id . '/delete');
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
     	$category = Category::findOrfail($id);
     	$category->delete();
        flash('Your category has been deleted!');
        return URL::to('category');
    }
}
