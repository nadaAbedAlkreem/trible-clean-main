<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App ; 

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->route('locale') ?? 'en'; 
          if (in_array($locale, ['en', 'ar'])) {
            App::setLocale($locale);
            switch ($locale) {
                case 'en':
                    setlocale(LC_ALL, 'en_US.UTF-8');
                    break;

                case 'ar':
                    setlocale(LC_ALL, 'ar_SA.UTF-8');
                    break;
            }
        } else {
            abort(404);
        }

        return $next($request);
    }
}
