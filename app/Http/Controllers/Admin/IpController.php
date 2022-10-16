<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Ip;
use App\Page;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

/**
 * Class IpController.
 *
 * @author  The scaffold-interface created at 2018-01-11 03:46:21pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class IpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Index - ip';
        $ipss = Ip::with('pages')->paginate(50);//->sortByDesc('created_at');

        if(isset($request->id)){
            $pagesByIP = Ip::with(['pages' => function($query){
                $query->orderBy('page');
            }])->find($request->id);
            //->orderBy('page')->get();//->reverse()->unique('page');
        } else $pagesByIP = null;

        $ips = Ip::paginate(300);
        return view('ip.index',compact('ips','title', 'ipss', 'pagesByIP'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - ip';

        return view('ip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ip = new Ip();

        $ip->ip = $request->ip;

        $ip->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new ip has been created !!']);

        return redirect('ip');
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
        $title = 'Show - ip';

        if($request->ajax())
        {
            return URL::to('ip/'.$id);
        }

        $ip = Ip::findOrfail($id);
        return view('ip.show',compact('title','ip'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - ip';
        if($request->ajax())
        {
            return URL::to('ip/'. $id . '/edit');
        }

        $ip = Ip::findOrfail($id);
        return view('ip.edit',compact('title','ip'  ));
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
        $ip = Ip::findOrfail($id);

        $ip->ip = $request->ip;

        $ip->save();

        return redirect('ip');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/ip/'. $id . '/delete');

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
     	$ip = Ip::findOrfail($id);
     	$ip->delete();
        return URL::to('ip');
    }
}
