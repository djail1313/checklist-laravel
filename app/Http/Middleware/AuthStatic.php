<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class AuthStatic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = 'Vm25gWyrS3L5PUTpUxLhTjZJZCsZGcnZxbQZGj6UTkaDfWGddV5zQeTgu6shky9wzruCn7eSdwZyPfGcYpsGLRTRttdejPJcB6q3LbfWVfR9FApDymHtZeHaxENWRZB7';

        if (! $request->header('authorization')
            || $token !== trim(str_replace(['Bearer', 'bearer'], '', $request->header('authorization')))) {
            throw new UnauthorizedException();
        }

        Auth::login(new User([
            'id' => 1,
            'name' => 'User',
            'email' => 'user@user.com',
        ]));

        return $next($request);
    }
}
