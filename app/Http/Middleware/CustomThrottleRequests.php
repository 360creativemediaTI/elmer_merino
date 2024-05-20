<?php

namespace App\Http\Middleware;

use Illuminate\Routing\Middleware\ThrottleRequests as BaseThrottleRequests;
use Closure;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\RateLimiter;

class CustomThrottleRequests extends BaseThrottleRequests
{
    protected function buildResponse($key, $maxAttempts)
    {
        $response = response()->json([
            'message' => 'Too Many Attempts. You have exceeded your 3 attempts limit.'
        ], 429);

        return $this->addHeaders(
            $response,
            $maxAttempts,
            $this->calculateRemainingAttempts($key, $maxAttempts)
        );
    }

    public function handle($request, Closure $next, $maxAttempts = 3, $decayMinutes = 1)
    {
        $key = $this->resolveRequestSignature($request);

        if ($this->limiter()->tooManyAttempts($key, $maxAttempts)) {
            return $this->buildResponse($key, $maxAttempts);
        }

        $this->limiter()->hit($key, $decayMinutes * 60);

        $response = $next($request);

        return $this->addHeaders(
            $response,
            $maxAttempts,
            $this->calculateRemainingAttempts($key, $maxAttempts)
        );
    }
}
