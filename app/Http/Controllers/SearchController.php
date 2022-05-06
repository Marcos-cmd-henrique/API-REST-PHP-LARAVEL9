<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use illuminate\Support\Facades\Auth; 
use App\Http\Controllers\SearchController;

class SearchController extends Controller
{
  
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $posts = Post::where('title', 'LIKE',"%$request->search%")
                        ->orWhere('content', 'LIKE', "%{$request->search}%")
                        ->paginate(1);
        return view('admin.posts.index', compact('posts', 'filters'));
    }
}