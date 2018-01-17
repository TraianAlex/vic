<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class NotificationController.
 *
 * @author  The scaffold-interface created at 2018-01-16 02:29:52pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - notification';
        $notifications = Notification::paginate(6);
        return view('notification.index',compact('notifications','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - notification';

        return view('notification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notification = new Notification();


        $notification->type = $request->type;


        $notification->notifiable_type = $request->notifiable_type;
        $notification->notifiable_id = $request->notifiable_id;

        $notification->data = $request->data;


        $notification->read_at = $request->read_at;



        $notification->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new notification has been created !!']);

        return redirect('notification');
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
        $title = 'Show - notification';

        if($request->ajax())
        {
            return URL::to('notification/'.$id);
        }

        $notification = Notification::findOrfail($id);
        return view('notification.show',compact('title','notification'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - notification';
        if($request->ajax())
        {
            return URL::to('notification/'. $id . '/edit');
        }


        $notification = Notification::findOrfail($id);
        return view('notification.edit',compact('title','notification'  ));
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
        $notification = Notification::findOrfail($id);

        $notification->type = $request->type;

        $notification->notifiable_type = $request->notifiable_type;
        $notification->notifiable_id = $request->notifiable_id;

        $notification->data = $request->data;

        $notification->read_at = $request->read_at;


        $notification->save();

        return redirect('notification');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/notification/'. $id . '/delete');

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
     	$notification = Notification::findOrfail($id);
     	$notification->delete();
        return URL::to('notification');
    }
}
