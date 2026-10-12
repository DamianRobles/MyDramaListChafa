<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RegistrarAccion
{
    public function handle(Request $request, Closure $next): Response
    {
        // ANTES: la petición todavía no llega al controlador
        Log::info('Entra: ' . $request->method() . ' /' . $request->path());

        $response = $next($request); // aquí corre el controlador

        // DESPUÉS: el controlador ya respondió
        Log::info('Sale: código ' . $response->getStatusCode());

        return $response;
    }
}
