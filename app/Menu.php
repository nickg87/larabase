<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'menu';
    public $menus = array();

    public function parent() {
        return $this->belongsTo('App\Menu','parent_id');
    }

    // Each category may have multiple children
    public function children() {
        return $this->hasMany('App\Menu','parent_id');
    }

    // recursive, loads all descendants
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }
    // recursive, loads all descendants
    public function parentRecursive()
    {
        return $this->parent()->with('parentRecursive');
    }

    function getDepth($menu, $level = 0) {
        if ($menu->parent_id>0) {
            if ($menu->parent) {
                    $level++;
                    return $this->getDepth($menu->parent, $level);
                }
            }
           return $level;
        }

    // ---------------------------------- //
    public function indexTree($level) {
        $index='';
        for ($i=0; $i<$level; $i++) {
            if ($i-1<$level)  $index.='&nbsp;&nbsp;&nbsp;';
            if ($i+1==$level) $index.='&bull;';
        }
        return $index;
    }

    public static function getMenuZoneTree($zone) {
        return (new self())->getZoneMenus($zone);
    }
    private function getZoneMenus($zone)
    {
        $mainMenus = Menu::where([['zone_id','=', $zone],['parent_id','=',0]])->withCount('children')->orderBy('link', 'asc')->get();
        //if ($zone==1) dd($mainMenus);
        foreach ($mainMenus as $menu) {
            $this->menus[] = $menu;
            $menu['level'] = 0;
            $this->getParentMenus($menu, 0);
        }

        return $this->menus;
    }

    public static function getMenuTree() {
        return (new self())->getMenus();
    }

    private function getMenus()
    {
        $mainMenus = Menu::where('parent_id', 0)->orwhereNull('parent_id')->orderBy('link', 'asc')->get();
        foreach ($mainMenus as $menu) {
            $this->menus[] = $menu;
            $menu['level'] = 0;
            $this->getParentMenus($menu, 0);
        }

        return $this->menus;
    }

    private function getParentMenus($menu, $level)
    {
        if($subMenus = $menu->children) {
            $level++;
            foreach($subMenus as $subMenu) {
                $subMenu['level'] = $level;
                $this->menus[] = $subMenu;
                $this->getParentMenus($subMenu, $level);
            }
        }

    }
    public function pages()
    {
        return $this->hasMany('App\Page');
    }
    public function statics() {
        // this returns only pages that are not static (ex blog posts)
        return $this->pages()->where('is_static','=', 1);
    }

}
