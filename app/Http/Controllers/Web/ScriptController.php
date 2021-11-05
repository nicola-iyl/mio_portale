<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Script;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    public function create($post_id)
    {
       $params = [
          'post_id' => $post_id,
          'form_name' => 'form_create_script'
       ];
       return view('script.create',$params);
    }

    public function store(Request $request)
    {
       $request->validate(['post_id' => 'required|integer']);

       try{
          $script = new Script();
          $script->post_id = $request->get('post_id');
          $script->desc = $request->get('desc');
          $script->code = $request->get('code');
          $script->save();
          return ['result' => 1, 'msg' => 'Elemento creato con successo','url'=> route('post',['id' => $request->get('post_id')])];
       }catch(\Exception $e){
          return ['result' => 0, 'msg' => $e->getMessage()];
       }
    }

    public function delete($id)
    {
       $script = Script::find($id);
       if(!$script){
          return back()->with('error','Elemento non trovato');
       }
       $script->delete();
       return back()->with('success','Elemento eliminato con successo');
    }
}
