<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
   public function index()
   {
      $title_page = 'Tags';
      $tags = Tag::all();
      $params = [
         'title_page' => $title_page,
         'tags' => $tags,
      ];
      return view('tags.index', $params);
   }

   public function create()
   {
      $params = [
         'form_name'  => 'form_tags_create'
      ];
      return view('tags.create', $params);
   }

   public function store(Request $request)
   {
      $request->validate(['name' => 'required|string']);

      try
      {
         $post = new Tag();
         $post->name = $request->get('name');
         $post->save();

         return ['result' => 1, 'msg' => 'Elemento creato con successo'];
      }
      catch(\Exception $e)
      {
         return ['result' => 0, 'msg' => $e->getMessage()];
      }
   }

   public function delete($id)
   {
      $tag = Tag::find($id);
      if($tag)
      {
         $tag->delete();
         return back()->with('success','Elemento eliminato con successo');
      }

      return back()->with('error','Elemento non trovato');
   }
}
