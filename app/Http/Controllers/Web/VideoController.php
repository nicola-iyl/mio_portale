<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
   public function create($post_id)
   {
      $params = [
         'post_id' => $post_id,
         'form_name' => 'form_create_video'
      ];
      return view('video.create',$params);
   }

   public function store(Request $request)
   {
      $request->validate(['post_id' => 'required|integer','link' => 'required|string']);

      try{
         $video = new Video();
         $video->post_id = $request->get('post_id');
         $video->name = $request->get('name');
         $video->link = $request->get('link');
         $video->save();
         return ['result' => 1, 'msg' => 'Elemento creato con successo','url'=> route('post',['id' => $request->get('post_id')])];
      }catch(\Exception $e){
         return ['result' => 0, 'msg' => $e->getMessage()];
      }
   }

   public function delete($id)
   {
      $item = Video::find($id);
      if(!$item){
         return back()->with('error','Elemento non trovato');
      }
      $item->delete();
      return back()->with('success','Elemento eliminato con successo');
   }
}
