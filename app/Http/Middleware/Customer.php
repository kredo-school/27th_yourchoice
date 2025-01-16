<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();

        // ユーザーがログインしていない、または指定されたrole_idに一致しない場合
        if (!$user || $user->role_id != 1) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['error' => 'You do not have access to this page.']);
        }

        return $next($request);
    }
}
