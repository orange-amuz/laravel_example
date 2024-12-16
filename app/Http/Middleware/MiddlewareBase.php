<?php

namespace App\Http\Middleware;

use App\Services\Messages;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MiddlewareBase {
  public string $name = 'default';

  public function __construct() {

  }

  /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      Messages::addMessage($this->name);

      return $next($request);
    }
}