<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
   public function create($post_id)
   {
      $params = [
         'post_id' => $post_id,
         'form_name' => 'form_create_link'
      ];
      return view('link.create',$params);
   }

   public function store(Request $request)
   {
      $request->validate(['post_id' => 'required|integer','url' => 'required|string']);

      try{
         $link = new Link();
         $link->post_id = $request->get('post_id');
         $link->name = $request->get('name');
         $link->url = $request->get('url');
         $link->save();
         return ['result' => 1, 'msg' => 'Elemento creato con successo','url'=> route('post',['id' => $request->get('post_id')])];
      }catch(\Exception $e){
         return ['result' => 0, 'msg' => $e->getMessage()];
      }
   }

   public function delete($id)
   {
      $item = Link::find($id);
      if(!$item){
         return back()->with('error','Elemento non trovato');
      }
      $item->delete();
      return back()->with('success','Elemento eliminato con successo');
   }
}
