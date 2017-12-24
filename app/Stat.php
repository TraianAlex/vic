<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Stat.
 *
 * @author  The scaffold-interface created at 2017-12-22 12:30:16am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Stat extends Model
{
    protected $table = 'stats';
	protected $fillable = ['page, ip'];
}
