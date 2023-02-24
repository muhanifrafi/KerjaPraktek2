<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class SessionTimeout
{
    public function handle($request, Closure $next)
    {        
        $inactivityDuration = 120;
        if (Auth::check()) {
            $sessionTimeout = $request->session()->get('session_timeout');
    
            if ($sessionTimeout && time() < $sessionTimeout + $inactivityDuration) {
                $request->session()->put('session_timeout', time() + $inactivityDuration);
            } else {
                // The user has been inactive for too long, logout the user
                $request->session()->forget('session_timeout');
                Auth::logout();
                return redirect('/')->withErrors(['session_timeout' => 'Your session has timed out.']);
            }
        }
        return $next($request);
    }
}