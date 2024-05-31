<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizePrivatePost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $slug = $request->route('slug');
        $post = Post::where('slug', $slug)->first();
    
        if ($post && $post->access === 'private' && $post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized.');
        }
    
        return $next($request);
    }
    
}
