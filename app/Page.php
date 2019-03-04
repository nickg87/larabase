<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'page';
    //
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function author()
    {
        return $this->belongsTo('App\User');
    }
    public function images()
    {
        return $this->belongsToMany('App\ImageUp', 'image_page', 'page_id', 'image_id')->withPivot('ord')->orderBy('pivot_ord');
    }
    public function files()
    {
        return $this->belongsToMany('App\FileUp', 'file_page', 'page_id', 'file_id')->withPivot('ord')->orderBy('pivot_ord');
    }
    public function isStatic() {
        if ($this->is_static) return true;
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function approved_comments()
    {
        return $this->comments()->where('approved','=', 1);
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
