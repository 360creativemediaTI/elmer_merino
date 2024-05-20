<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyApiToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if ($token === env('FREE_API_TOKEN')) {
            $request->attributes->add(['api_type' => 'free']);
            $maxAttempts = 3; // Limita a 3 solicitudes por minuto para API libre
            $decayMinutes = 1;
        } elseif ($token === env('PAID_API_TOKEN')) {
            $request->attributes->add(['api_type' => 'paid']);
            $maxAttempts = 1000; // Un número muy alto para efectivamente no tener límite
            $decayMinutes = 1;
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return app(\Illuminate\Routing\Middleware\ThrottleRequests::class)
            ->handle($request, $next, $maxAttempts, $decayMinutes);
    }

}
