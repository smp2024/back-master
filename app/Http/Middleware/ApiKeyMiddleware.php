<?php

namespace App\Http\Middleware;

use Closure;

class ApiKeyMiddleware
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
          // Verificar si es un método POST y si la api_key está presente
        if ($request->isMethod('post')) {
            if (!$request->has('api_key')) {
                return response()->json(['error' => 'API key is required', 'flag' => false], 400);
            }
        } else {
            // Respuesta si no es un método POST
            return response()->json(['error' => 'Invalid request method', 'flag' => false], 405);
        }

        return $next($request);
    }
}
