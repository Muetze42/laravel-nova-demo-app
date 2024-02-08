<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutoLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @throws Exception
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector|mixed|Response
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (!auth()->check()) {
            $user = User::inRandomOrder()->first();
            if (!$user) {
                throw new Exception('No User found. Please run `php artisan migrate --seed`');
            }
            /* @var User $user */
            Auth::login($user);

            return redirect($request->getRequestUri());
        }

        return $next($request);
    }
}
