<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $logData = [
            'datetime' => now()->toDateTimeString(),
            'method'   => $request->method(),
            'url'      => $request->fullUrl(),
            'body'     => $request->all(),
        ];

        $logText = json_encode($logData, JSON_PRETTY_PRINT) . "\n\n";

        File::append(storage_path('logs/log.txt'), $logText);

        return $next($request);
    }
}
