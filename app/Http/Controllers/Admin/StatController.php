<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Stat;
use App\Resources\Pagination;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

/**
 * Class StatController.
 *
 * @author  The scaffold-interface created at 2017-12-22 12:30:16am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class StatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Stat $stat)
    {
        $title = 'Index - stat';
        $stats = $stat->paginate(10);
        return view('stat.index',compact('stats', 'title'));
    }

    public function getIps(Request $request, Stat $stat, Pagination $paginate_ip)
    {
        $title = 'IPs';
        $item = $stat->get();
        $ip_unique = $this->extract($item, 'ip');
        $total_unique_ips = count($ip_unique);

        $ip_unique = $paginate_ip->paginate( $ip_unique, 12);

        if(isset($request->ip)){
            $pagesByIP = $this->extract($item->where('ip', $request->ip), 'page');
        }
        return view('stat.ips',compact('title', 'total_unique_ips', 'ip_unique', 'pagesByIP', 'paginate_ip', 'request'));
    }

    public function getPages(Request $request, Stat $stat, Pagination $paginate_pages)
    {
        $title = 'Pages';
        $item = $stat->get();

        $pages = $this->extract($item, 'page');
        $pages = $paginate_pages->paginate($pages, 14);

        return view('stat.pages',compact('title', 'pages', 'paginate_pages' , 'request'));
    }

    public function destroyIp($ip, Stat $stat)
    {
        $stat = $stat->where('ip', $ip);
        $stat->delete();
        flash('Your data has been deleted!');
        return redirect()->back();//redirect('stat/ips');
    }

    protected function extract($collection, $page)
    {
        $key = []; $sum_date = [];
        $all = $collection->unique($page)->sortByDesc('created_at');
        foreach ($all as $one) {
            $pages = $collection->where($page, $one->$page);
            $key[] = $one->$page;
            foreach ($pages as $date) {
                $last_date = $date->created_at->diffForHumans();
            }
            $sum_date[] = [count($pages), $last_date];

        }
        return array_combine($key, $sum_date);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request, Stat $stat)
    {
        if (!preg_match('/^127.0.0.(1|2|3|4|5)$/', $request->ip, $match)) {
            $stat->page = $request->page;
            $stat->ip = $request->ip;
            $stat->save();
            flash('Your data has been created!');
        }
        $pusher = App::make('pusher');
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new stat has been created !!']);
        return redirect('stat');
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
        $title = 'Show - stat';
        if($request->ajax())
        {
            return URL::to('stat/'.$id);
        }
        $stat = Stat::findOrfail($id);
        return view('stat.show',compact('title','stat'));
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
        $stat = Stat::findOrfail($id);
        $stat->page = $request->page;
        $stat->ip = $request->ip;
        $stat->save();
        flash('Your data has been updated!');
        return redirect('stat');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/stat/'. $id . '/delete');
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
     	$stat = Stat::findOrfail($id);
     	$stat->delete();
        flash('Your data has been deleted!');
        return URL::to('stat');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - stat';
        return view('stat.create');
    }

     /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - stat';
        if($request->ajax())
        {
            return URL::to('stat/'. $id . '/edit');
        }
        $stat = Stat::findOrfail($id);
        return view('stat.edit',compact('title','stat'  ));
    }
}
