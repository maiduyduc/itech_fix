<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'parent_id', 'slug'];

    public function categoryChidlren()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
