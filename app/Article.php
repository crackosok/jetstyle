<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];
    public function author() {
        return $this->belongsTo('App\Author');
    }
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
