<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageUp extends Model
{
    //
    protected $table = 'image';
    public function pages()
    {
        return $this->belongsToMany('App\Page', 'image_page', 'image_id', 'page_id')->withPivot('ord')->orderBy('pivot_ord');
    }
}
