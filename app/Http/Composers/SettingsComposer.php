<?php

namespace App\Http\Composers;

use App\Setting;
use Illuminate\Contracts\View\View;

class SettingsComposer
{

    public function compose(View $view)
    {
    $view->with('settings', Setting::find(1));
    }
}

?>