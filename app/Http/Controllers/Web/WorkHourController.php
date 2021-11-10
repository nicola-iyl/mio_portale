<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\WorkHour;
use Illuminate\Http\Request;
use App\Models\Work;

class WorkHourController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      //
   }


   public function create(Request $request, $work_id)
   {
      $work = Work::find($work_id);
      if($request->ajax())
      {
         $params = [
            'work' => $work,
         ];
         return view('work_hour.form_additem_modal', $params);
      }
   }

   public function store(Request $request)
   {
      $request->validate(['work_id' => 'required', 'qty' => 'required','desc' => 'required','data'=>'required']);

      try{
         $item = new WorkHour();
         $item->work_id = $request->get('work_id');
         $item->desc = $request->get('desc');
         $item->qty = $request->get('qty');
         $item->data = $request->get('data');
         $item->status = 1;
         $item->save();

         return ['result' => 1, 'msg' => 'Elemento creato con successo'];
      }catch(\Exception $e){
         return ['result' => 0, 'msg' => $e->getMessage()];
      }
   }

   /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function delete($id)
   {
      //
   }
}
