<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //
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
