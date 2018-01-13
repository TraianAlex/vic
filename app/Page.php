<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Page.
 *
 * @author  The scaffold-interface created at 2018-01-11 03:51:16pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Page extends Model
{


    protected $table = 'pages';

	protected $fillable = ['page'];

	/**
     * ip.
     *
     * @return  \Illuminate\Support\Collection;
     */
    public function ips()
    {
        return $this->belongsToMany('App\Ip')->withTimestamps();;
    }

    /**
     * Assign a ip.
     *
     * @param  $ip
     * @return  mixed
     */
    public function assignIp($ip)
    {
        return $this->ips()->attach($ip);
    }
    /**
     * Remove a ip.
     *
     * @param  $ip
     * @return  mixed
     */
    public function removeIp($ip)
    {
        return $this->ips()->detach($ip);
    }

}
