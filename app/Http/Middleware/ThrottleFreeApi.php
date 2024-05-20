<?php

namespace App\Http\Middleware;

use Closure;

class ThrottleFreeApi
{
    public function handle($request, Closure $next)
    {
        $key = 'free_api:' . $request->user()->id;
        $maxAttempts = 3;

        if (Cache::has($key)) {
            $attempts = Cache::get($key);

            if ($attempts >= $maxAttempts) {
                return response()->json(['message' => 'Too many requests'], 429);
            }

            Cache::increment($key);
        } else {
            Cache::put($key, 1, 60);
        }

        return $next($request);
    }
}

