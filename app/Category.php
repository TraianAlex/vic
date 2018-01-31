<?php

namespace App;

use App\Traits\Cacheable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category.
 *
 * @author  The scaffold-interface created at 2017-12-04 04:09:59pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Category extends Model
{
    use Cacheable;

    protected $table = 'categories';

    protected $touches = ['links'];
	/**
     * link.
     *
     * @return  \Illuminate\Support\Collection;
     */
    public function links()
    {
        return $this->belongsToMany('App\Link')->latest();
    }

    /**
     * Assign a link.
     *
     * @param  $link
     * @return  mixed
     */
    public function assignLink($link)
    {
        return $this->links()->attach($link);
    }
    /**
     * Remove a link.
     *
     * @param  $link
     * @return  mixed
     */
    public function removeLink($link)
    {
        return $this->links()->detach($link);
    }
    /**
     * resolve the route model binding by name instead of id
     * used in HomeController@tag
     * @return [string]
     */
    public function getRouteKeyName()
    {
        return 'name';
    }
}
