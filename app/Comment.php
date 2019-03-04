<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    //
    protected $table = 'comment';
    protected $fillable = [
        'approved',
    ];


    public function page()
    {
        return $this->belongsTo('App\Page');
    }
}
