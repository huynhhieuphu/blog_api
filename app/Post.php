<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'slug', 'images', 'description', 'body', 'category_id', 'status'];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
