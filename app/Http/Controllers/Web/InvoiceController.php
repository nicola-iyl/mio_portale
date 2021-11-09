<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
   public function index()
   {
      $year = date('Y');
      $fatture = Invoice::where('anno', $year)->get();
      $title_page = 'Fatture del '.$year;
      $params = [
         'fatture'    => $fatture,
         'open_menu'  => 'gestionale',
         'title_page' => $title_page,
         'year'       => $year
      ];
      return view('invoice.index', $params);
   }

   public function all()
   {
      $fatture = Invoice::all();
      $title_page = 'Tutte le fatture';
      $params = [
         'fatture'    => $fatture,
         'open_menu'  => 'gestionale',
         'title_page' => $title_page,
         'year'       => ''
      ];
      return view('invoice.index', $params);
   }

   public function pdf($id)
   {
      $fattura = Invoice::find($id);
      if(!$fattura){ return back()->with('error','Elemento non trovato'); }


      $params = [
         'fattura' => $fattura,
      ];

      $pdf = \PDF::loadView('invoice.pdf', $params);
      return $pdf->stream('fattura_'.$fattura->numero.'_'.$fattura->anno.'.pdf');
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
