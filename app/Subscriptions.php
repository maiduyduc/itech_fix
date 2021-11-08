<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Subscriptions extends Model
{
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(courses::class, 'course_id');
    }

}
