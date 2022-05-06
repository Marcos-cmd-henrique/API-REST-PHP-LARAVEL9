<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use illuminate\Support\Facades\Auth; 

class PostController extends Controller
{
    public function index() 
    {
        $posts= Post::with('user')->orderBy('id', 'DESC')->paginate(15);
        $posts=Post::orderBy('id', 'DESC')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {  
        $request->merge(['user_id' => auth()->user()->id ]); 
        $post = Post::create ($request->all());
        return redirect()->route('posts.index');

        //image upload
        if($request->hasFile('image') && request->file('image')->isValid()) 
        {
            $requestImage = $request->image; 
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension; 
            $RequestImage->move(public_path('img/posts'), $imageName); 
            $posts->image = $imageName; 
        }

        $posts->Save(); 
    }
    
    public function show ($id)
    {
       if (!$post = Post::find($id)) {
           return redirect()->route('posts.index');
       }
        return view('admin.posts.show', compact('post'));
    }

    public function destroy ($id)
    {
       if (!$post = Post::find($id))
            return redirect()->route('posts.index');
        $post->delete();  

        return redirect()->route('posts.index')
                        ->with('message', 'Post Deletado com sucesso..');
       
    }

    public function edit($id)
    {
        if (!$post = Post::find($id)){
            return redirect()->back();
        }
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        if (!$post = Post::find($id))
        {
            return redirect()->back();
        }
        $post->update($request->all());

        return redirect()->route('posts.index')
                         ->with('message',' Post Atualizado com sucesso..');
    }

}