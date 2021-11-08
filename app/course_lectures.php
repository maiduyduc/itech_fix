<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class course_lectures extends Model
{
    use SoftDeletes;

    protected $guarded = [];

}
