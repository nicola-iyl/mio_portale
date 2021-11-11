<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Work;
use App\Models\WorkHour;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;

class WorkController extends Controller
{
   public function index()
   {
      $works = Work::where('status', 0)->get();
      $title_page = 'Lavori da fatturare';
      $params = [
         'works'      => $works,
         'open_menu'  => 'gestionale',
         'title_page' => $title_page,
      ];
      return view('work.index', $params);
   }

   public function all()
   {
      $works = Work::all();
      $title_page = 'Lavori';
      $params = [
         'works'      => $works,
         'open_menu'  => 'gestionale',
         'title_page' => $title_page,
      ];
      return view('work.index', $params);
   }

   public function pdfOre($id)
   {
      $work = Work::find($id);
      if(!$work){ return back()->with('error','Elemento non trovato'); }

      $hours = WorkHour::where('work_id',$work->id)->get();

      $params = [
         'work' => $work,
         'hours' => $hours
      ];

      $pdf = \PDF::loadView('work.pdf_ore', $params);
      return $pdf->stream('ore_lavoro_'.$work->id.'.pdf');

   }

   public function create(Request $request)
   {
      $customers = Customer::all();

      if($request->ajax())
      {
         $params = ['customers' => $customers];
         return view('work.create', $params);
      }
   }


   public function store(Request $request)
   {
      $request->validate(['customer_id' => 'required', 'data' => 'required','desc' => 'required','name'=>'required']);

      try{
         $item = new Work();
         $item->customer_id = $request->get('customer_id');
         $item->desc = $request->get('desc');
         $item->name = $request->get('name');
         $item->data = $request->get('data');
         $item->status = 0;
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

   public function delete($id)
   {
      $work = Work::find($id);
      if(!$work){
         return back()->with('error','Elemento non trovato');
      }
      $work_hours = $work->workHours;
      if($work_hours)
      {
         foreach($work_hours as $item)
         {
            $item->delete();
         }
      }
      $work->delete();
      return back()->with('success','Elemento eliminato con successo');
   }

   public function changeStatus($work_id,$value)
   {
      $work = Work::find($work_id);
      if(!$work){
         return ['result' => 0, 'msg' => 'Elemento non trovato'];
      }

      $work->status = $value;
      $work->save();

      return ['result' => 1, 'msg' => 'Elemento aggiornato con successo'];
   }
}
