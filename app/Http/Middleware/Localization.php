<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Carbon\Carbon;


class Localization
{
    public function __construct() {
        $this->default = config('app.locale');
        $this->availables = config('app.locales');
        $this->fallback_locale = config('app.fallback_locale');
        $this->desired = Session::get('locale');
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $name = $request->input('id', 'Sally');
        // Make sure current locale exists.
        Session::forget('warning');
        if (array_key_exists($this->desired,$this->availables) ) {
            if ( Session::get('locale') ) {
                \App::setLocale(\Session::get('locale'));
                Carbon::setLocale(\Session::get('locale'));
                }
            } else {
            \App::setLocale($this->default);
            Carbon::setLocale($this->default);
            if ( $this->desired ) {
                    if (!array_key_exists($this->desired,$this->availables)){
                        Session::flash('warning', 'This language ['.$this->desired.'] is not set yet!');
                    }
                }
            }


        return $next($request);
    }
}
