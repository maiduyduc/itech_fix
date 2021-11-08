<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class courses extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    //lay ra danh muc cua khoa hoc
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function courseLectures()
    {
        return $this->hasMany(course_lectures::class, 'course_id');
    }
}
