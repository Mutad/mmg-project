<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name','content','category_id','file_path'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
