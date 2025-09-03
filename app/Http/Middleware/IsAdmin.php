<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{

    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('admin')->check()) {
            return $next($request);
        }
        return redirect()->route("login.index")->withErrors('Access denied.');
    }
}
