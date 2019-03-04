<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function pages()
    {
        return $this->hasMany('App\Page', 'author_id');
    }
    public function posts() {
        // this returns only pages that are not static (ex blog posts)
        return $this->pages()->where('is_static','<>', 1);
    }

    public function setUpdatedAt($value)
    {
        // Do nothing.
    }
    public function avatar()
    {
        if (file_exists( public_path() . '/images/icon/' . $this->avatar) && $this->avatar) {
            return '/images/icon/' . $this->avatar;
        } else {
            return '/images/icon/avatar-default.png';
        }
    }
    public function authorPic()
    {
        if (file_exists( public_path() . '/images/author/' . $this->avatar) && $this->avatar) {
            return '/images/author/' . $this->avatar;
        } else {
            return '/frontend/img/no-image.jpg';
        }
    }
    public function isAdmin()
    {
        if ($this->isAdmin==0)  {
            return true;
        } else {
            return false;
        }
    }
    public function isUser()
    {
        if ($this->isAdmin==2)  {
            return true;
        } else {
            return false;
        }
    }
}
