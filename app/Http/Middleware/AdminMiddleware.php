<?php

namespace App\Http\Middleware;

use App\Http\Services\Api\UserService;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /* @var User $user */
        $user = auth()->user();

        if(UserService::isAdmin($user)) {
            return $next($request);
        }

        throw new AccessDeniedHttpException();
//        abort(403);
    }
}
