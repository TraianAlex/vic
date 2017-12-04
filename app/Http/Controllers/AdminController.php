<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use App\Http\Requests;
use App\Http\Requests\LoginAdminRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminController.
 *
 * @author  The scaffold-interface created at 2017-12-03 11:42:34pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class AdminController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(LoginAdminRequest $request)
    {
        if(!admins()->attempt(['name' => $request['name'], 'password' => $request['password']])){
            return redirect()->back()->with('fail', 'Could not be log you in!');
        }
        return redirect('admin');
    }

    public function getLogout()
    {
        admins()->logout();
        return redirect('/adm/login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - admin';
        $admins = Admin::paginate(6);
        return view('admin.index',compact('admins','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - admin';

        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new Admin();

        $admin->name = $request->name;

        $admin->email = $request->email;

        $admin->password = bcrypt($request->password);

        $admin->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new admin has been created !!']);

        return redirect('admin');
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
        $title = 'Show - admin';

        if($request->ajax())
        {
            return URL::to('admin/'.$id);
        }

        $admin = Admin::findOrfail($id);
        return view('admin.show',compact('title','admin'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - admin';
        if($request->ajax())
        {
            return URL::to('admin/'. $id . '/edit');
        }

        $admin = Admin::findOrfail($id);
        return view('admin.edit',compact('title','admin'  ));
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
        $admin = Admin::findOrfail($id);

        $admin->name = $request->name;

        $admin->email = $request->email;

        $admin->password = $request->password;


        $admin->save();

        return redirect('admin');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/admin/'. $id . '/delete');

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
     	$admin = Admin::findOrfail($id);
     	$admin->delete();
        return URL::to('admin');
    }
}
