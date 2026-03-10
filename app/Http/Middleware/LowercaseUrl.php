<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LowercaseUrl
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    $path = $request->getRequestUri();

    if ($path !== strtolower($path)) {
      return redirect(strtolower($path), 301);
    }

    $cleanUrl = rtrim(strtolower($path), '/');

    if ($path !== $cleanUrl) {
      return redirect($cleanUrl, 301);
    }

    return $next($request);
  }
}
