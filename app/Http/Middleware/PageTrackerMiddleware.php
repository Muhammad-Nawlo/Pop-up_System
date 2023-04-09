<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\PopupSystem\Entities\Compaign;
use Modules\PopupSystem\Popup\PopupFactory;
use Symfony\Component\HttpFoundation\Response;

class PageTrackerMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {

        $page = parse_url($request->getUri(), PHP_URL_PATH); // Get the path component of the URL
        $compaign = Compaign::query()->where('name', '=', $page)->first();
        $popups = $compaign?->popups;
        $res = [];
        if ($popups) {
            foreach ($popups as $popup) {
                $res[] = PopupFactory::createPopup($popup);
            }
        }
        Session::put('popups', $res);
        return $next($request);
    }
}
