<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Link.
 *
 * @author  The scaffold-interface created at 2017-12-04 04:11:03pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Link extends Model
{

    protected $table = 'links';
	/**
     * category.
     *
     * @return  \Illuminate\Support\Collection;
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    /**
     * Assign a category.
     *
     * @param  $category
     * @return  mixed
     */
    public function assignCategory($category)
    {
        return $this->categories()->attach($category);
    }
    /**
     * Remove a category.
     *
     * @param  $category
     * @return  mixed
     */
    public function removeCategory($category)
    {
        return $this->categories()->detach($category);
    }

    /**
     * Get a list of categories ids associated with the current link
     * @return array
     */
    public function getCategoriesListAttribute()
    {
        return $this->categories->pluck('id');//->all() resolved the problem in form
    }
}
