<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifiedUser
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard()->check()){
            if (Auth::user() -> verified_at == null){
                return redirect(RouteServiceProvider::VERIFY);
            }else{
                return $next($request);
            }
        }else{
            return redirect('login');
        }
    }
}
