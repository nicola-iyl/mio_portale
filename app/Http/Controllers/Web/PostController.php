<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
       $params = [];
       return view('post.index', $params);
    }

    /*public function show($id)
    {

    }*/

    public function create()
    {
       $categories = Category::all();
       $params = [
          'categories' => $categories,
          'form_name' => 'form_post_create'
       ];
       return view('post.create', $params);
    }

    public function store(Request $request)
    {
       $request->validate(['name' => 'required|string','desc' => 'required|string','category_id' => 'required']);

       try{
         $post = new Post();
         $post->category_id = $request->get('category_id');
         $post->name = $request->get('name');
         $post->desc = $request->get('desc');
         $post->tags = $request->get('tags');
         $post->save();

         return  ['result' => 1,'msg' => 'Elemento creato con successo'];
       }catch(\Exception $e){
          return ['result' => 0,'msg' => $e->getMessage()];
       }
    }

    public function edit($id)
    {
       $params = [];
       return view('post.edit',$params);
    }

    public function update(Request $request,$id)
    {

    }

    public function delete($id)
    {

    }
}
