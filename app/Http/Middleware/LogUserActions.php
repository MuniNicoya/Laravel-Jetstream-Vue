<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class LogUserActions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      $response = $next($request);

      // Log user actions
      Log::info('User Action', [
          'user_id' => auth()->id(), // Assuming you have authentication in place
          'route' => $request->route()->uri(),
          'method' => $request->method(),
          'ip' => $request->ip(),
          'user_agent' => $request->header('User-Agent'),
          // Add any additional information you want to log
      ]);

      return $response;
    }
}
