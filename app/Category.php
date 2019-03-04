<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public function pages()
    {
        return $this->hasMany('App\Page');
    }
    public function posts() {
        // this returns only pages that are not static (ex blog posts)
        return $this->pages()->where('is_static','<>', 1);
    }
}



