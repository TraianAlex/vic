<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ip.
 *
 * @author  The scaffold-interface created at 2018-01-11 03:46:21pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Ip extends Model
{
    protected $table = 'ips';
    protected $fillable = ['ip'];
	/**
     * page.
     *
     * @return  \Illuminate\Support\Collection;
     */
    public function pages()
    {
        return $this->belongsToMany('App\Page')->withTimestamps();;
    }

    /**
     * Assign a page.
     *
     * @param  $page
     * @return  mixed
     */
    public function assignPage($page)
    {
        return $this->pages()->attach($page);
    }
    /**
     * Remove a page.
     *
     * @param  $page
     * @return  mixed
     */
    public function removePage($page)
    {
        return $this->pages()->detach($page);
    }

}
