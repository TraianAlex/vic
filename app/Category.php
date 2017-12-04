<?php

namespace App;

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

    protected $table = 'categories';
	/**
     * link.
     *
     * @return  \Illuminate\Support\Collection;
     */
    public function links()
    {
        return $this->belongsToMany('App\Link');
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

}
