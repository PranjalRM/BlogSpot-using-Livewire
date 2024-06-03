<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AuthorizePrivatePost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $postId = $request->route('id');
        $post = Post::find($postId);
    
        if ($post && $post->access === 'private' && $post->user_id !== Auth::id()) {
            $message = 'Invalid access. You don\'t have permission to view this post.';
            return redirect('/')->with('error', $message);// Redirect with error message and red alert class
         
        }
    
        return $next($request);
    }
    
}
