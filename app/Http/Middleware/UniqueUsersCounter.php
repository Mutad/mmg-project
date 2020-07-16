<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;
use Log;
use Jenssegers\Agent\Agent;

class UniqueUsersCounter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Returns 1 if ip added
        if (Redis::sadd('ips',$request->ip())){

            // Increment Browser name by 1 in visits array
            Redis::hincrby('visits',(new Agent())->browser(),1);

        }

        return $next($request);
    }
}
