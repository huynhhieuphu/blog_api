<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name','slug','status'];

    public $timestamps = false;

    public function Posts()
    {
        return $this->hasMany('App\Post', 'category_id');
    }
}
