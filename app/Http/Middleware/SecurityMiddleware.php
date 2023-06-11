<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;

class SecurityMiddleware
{
    public function handle($request, Closure $next)
    {
        // XSS Protection
        $this->sanitizeInput($request);

        // SQL Injection Protection
        $this->stripTags($request);

        return $next($request);
    }

    private function sanitizeInput($request)
    {
        $input = $request->all();
        array_walk_recursive($input, function (&$value) {
            $value = strip_tags($value);
        });
        $request->merge($input);
    }

    private function stripTags($request)
    {
        $input = $request->all();
        array_walk_recursive($input, function (&$value) {
            $value = preg_replace('/\b(union|select|from|where)\b/i', '', $value);
        });
        $request->merge($input);
    }
}
