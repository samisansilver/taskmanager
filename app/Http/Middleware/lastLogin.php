<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Closure;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class lastLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user()->id;
        $now = Carbon::now();
        $updateuser = User::findOrFail($user);
        $updateuser->update([
            'last_login' => $now
        ]);
        return $next($request);
    }
}
