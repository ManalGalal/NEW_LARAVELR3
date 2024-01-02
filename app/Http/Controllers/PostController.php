<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller

{

    private $columns =['title','description','author','published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
  
    {
        $posts=Post::get();

      return view('Posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addPost');
    }

   

    public function store(Request $request){
         

        $data = $request->validate([
            'title'=>'required|string|max:50',
            'description'=> 'required|string',
            ]);
            
        $data['published'] = isset($request->published);
        Post::create($data);
        return redirect('posts');
    
        $data['published']= isset($request->published);
        Post::create($data);
        return redirect('posts');
        }
    // public function store(Request $request)
    // {
        
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Post::findOrFail($id);
        return view ('showPost', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=$request->only($this->columns);
        $data['published']=isset($request->published);
        
        Post::where('id',$id)->update($data);
        return redirect('posts');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id',$id)->delete();
        return redirect('posts');
    }
    // Update the specified resource in storage.
    
   public function trashedPosts()
   {
       $posts = Post::onlyTrashed()->get();
       return view('trashedPosts', compact('posts'));
   }
//forcedelete
   public function forcedelete(string $id)
   {
        Post::where('id',$id)->forceDelete();
       return redirect('posts');
   }


   public function restore(string $id)
   {
       Post::where('id',$id)->restore();
       return redirect('posts');
   }
}



/////



