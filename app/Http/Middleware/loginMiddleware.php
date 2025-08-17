<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect()->route('website.getlogin');
        } else {
            $user = Auth::user();
            if ($user->roles != 'admin') {
                return redirect()->route('website.getlogin');
            }
        }

        return $next($request);
    }
}
