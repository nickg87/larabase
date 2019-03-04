<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SiteSettingsComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->composeSettings();
    }

    public function composeSettings()
    {
        view()->composer(['admin.partials._header_desktop','admin.partials._head','front.partials._head','front.partials._footer','front.contact'],'App\Http\Composers\SettingsComposer');
    }
}
