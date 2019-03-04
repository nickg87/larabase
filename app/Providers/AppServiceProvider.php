<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $menusHeader = Menu::getMenuZoneTree(0);
        $menusFooter = Menu::getMenuZoneTree(1);
        $menusFooterNav = Menu::getMenuZoneTree(2);

        View::share('menusHeader', $menusHeader);
        View::share('menusFooter', $menusFooter);
        View::share('menusFooterNav', $menusFooterNav);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
