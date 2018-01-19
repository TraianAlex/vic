<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Admin;
use App\Http\Requests;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Http\Request;
use App\Events\AdminLoggedin;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateAdminRequest;

/**
 * Class AdminController.
 *
 * @author  The scaffold-interface created at 2017-12-03 11:42:34pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        event(new AdminLoggedin(admins()->user()));

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
    public function store(CreateAdminRequest $request)
    {
        Admin::create($request->validated());
        flash('Your admin has been created!');
        $pusher = App::make('pusher');
        $pusher->trigger('test-channel', 'test-event', ['message' => 'A new admin has been created !!']);
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

    public function getNotifications($id, Request $request)
    {
        $title = 'Show - admin notifications';
        if($request->ajax())
        {
            return URL::to('admin/notifications/'.$id);
        }
        $admin = Admin::findOrfail($id);
        return view('admin.notifications', compact('title','admin'));
    }

    public function markNotifications()
    {
        // admins()->user()->unreadNotifications->map(function($n){
        //     $n->markAsRead();
        // });
        admins()->user()->unreadNotifications->each->markAsRead();
        return back();
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
    public function update($id, Request $request)
    {
        $admin = Admin::findOrfail($id);
        $data = request()->validate([
            'name' => ['required','min:3','max:100', Rule::unique('admins','name')->ignore($admin->id)],
            'email' => ['required','email', Rule::unique('admins', 'email')->ignore($admin->id)],
            'password' => 'required|min:6|max:100'
        ]);
        $admin->update($data);
        // $exist = Storage::disk('local')->exists('storage/adm_avatars/'.$admin->id.'.jpeg');dd($exist);
        if($request->hasFile('avatar'))
        {
            $url = Storage::url('adm_avatars/'.$admin->id.'.jpeg');
            if (file_exists(getcwd().$url)) {
                Storage::delete(getcwd().$url);
            }
            $image = $request->file('avatar');
            if ($image->isValid()) {
                $image->storeAs('adm_avatars', $admin->id.'.'.$image->extension(), 'public');
            }
        }
        flash('Your admin has been updated!');
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
     	//$admin->delete();
        $url = Storage::url('adm_avatars/'.$admin->id.'.jpeg');
        Storage::delete($url);//getcwd().
        flash('Your admin has been deleted!');
        return URL::to('admin');
    }
}
