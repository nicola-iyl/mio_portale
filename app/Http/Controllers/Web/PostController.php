<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index()
   {
      $params = [];
      return view('post.index', $params);
   }

   public function show(Request $request, $id)
   {
      $post = Post::find($id);
      if($request->ajax())
      {
         $params = [
            'post' => $post,
         ];
         return view('post.show_modal',$params);
      }
      else
      {
         if(!$post){ return back()->with('error','elemento non trovato'); }
         $title_page = $post->name;
         $params = [
            'post' => $post,
            'title_page' => $title_page,
         ];
         return view('post.show',$params);
      }

   }

   public function create()
   {
      $categories = Category::all();
      $tags = Tag::all();
      $params = [
         'categories' => $categories,
         'tags' => $tags,
         'form_name'  => 'form_post_create'
      ];
      return view('post.create', $params);
   }

   public function store(Request $request)
   {
      $request->validate(['name' => 'required|string', 'desc' => 'required|string', 'category_id' => 'required']);
      $tags_array = $request->get('tags');
      $tags = '';
      if(is_array($tags_array) && count($tags_array) > 0){
         $tags = implode(",",$tags_array);
      }

      try
      {
         $post = new Post();
         $post->category_id = $request->get('category_id');
         $post->name = $request->get('name');
         $post->desc = $request->get('desc');
         $post->tags = $tags;
         $post->save();

         return ['result' => 1, 'msg' => 'Elemento creato con successo','url'=> route('post',['id' => $post->id])];
      }
      catch(\Exception $e)
      {
         return ['result' => 0, 'msg' => $e->getMessage()];
      }
   }

   public function edit($id)
   {
      $post = Post::find($id);
      if(!$post){ return back()->with('error','Elemento non trovato'); }
      $categories = Category::all();
      $tags_array = [];
      if($post->tags != '')
      {
         $tags_array = explode(',',$post->tags);
      }

      $title_page = 'Modifica '.$post->name;
      $tags = Tag::all();
      $params = [
         'categories' => $categories,
         'post' => $post,
         'tags' => $tags,
         'tags_array' => $tags_array,
         'form_name'  => 'form_post_update',
         'title_page' => $title_page
      ];
      return view('post.edit', $params);
   }

   public function update(Request $request, $id)
   {
      $post = Post::find($id);
      if(!$post){   return ['result' => 0, 'msg' => 'Elemento non trovato']; }
      $request->validate(['name' => 'required|string', 'desc' => 'required|string', 'category_id' => 'required']);

      $tags_array = $request->get('tags');
      $tags = '';
      if(is_array($tags_array) && count($tags_array) > 0){
         $tags = implode(",",$tags_array);
      }

      try
      {
         $post->category_id = $request->get('category_id');
         $post->name = $request->get('name');
         $post->desc = $request->get('desc');
         $post->tags = $tags;
         $post->save();

         return ['result' => 1, 'msg' => 'Elemento aggiornato con successo','url'=> route('post',['id' => $post->id])];
      }
      catch(\Exception $e)
      {
         return ['result' => 0, 'msg' => $e->getMessage()];
      }
   }

   public function delete($id)
   {
      $post = Post::find($id);
      if(!$post){
         return back()->with('error','Elemento non trovato');
      }
      $post->delete();
      return back()->with('success','Elemento eliminato con successo');
   }
}
