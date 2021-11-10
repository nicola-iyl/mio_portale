<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\InvoiceItem;
use App\Models\Work;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
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

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   public function showFormAddItem(Request $request)
   {
      $works = Work::where('status', 0)->get();
      if($request->ajax())
      {
         $params = [
            'works' => $works,
         ];
         return view('invoice_item.form_additem_modal', $params);
      }
   }

   public function addItem(Request $request)
   {
      $request->validate(['work_id' => 'required', 'imponibile' => 'required']);

      $work = Work::find($request->get('work_id'));
      if(!$work) { return "error"; }

      $invoice_item = new InvoiceItem();
      $invoice_item->work_id = $work->id;
      $invoice_item->desc = $work->name;
      $invoice_item->imponibile = $request->get('imponibile');

      \Session::push('invoice_items',$invoice_item);

      $items = \Session::get('invoice_items');
      $params = [ 'items' => $items ];

      return view('invoice_item.list',$params);
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
