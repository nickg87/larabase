<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUp extends Model
{
    //
    protected $table = 'file';
    public function pages()
    {
        return $this->belongsToMany('App\Page', 'file_page', 'file_id', 'page_id')->withPivot('ord')->orderBy('pivot_ord');;
    }
}
