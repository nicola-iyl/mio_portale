<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\CannotUseOnlyMethodsException;

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


   public function create()
   {
      $customers = Customer::all();
      $max_numero = DB::table('invoices')->where('anno', date('Y'))->max('numero');
      $numero = $max_numero + 1;

      \Session::remove('invoice_items');

      $params = [
         'customers' => $customers,
         'numero' => $numero,
         'form_name'  => 'form_invoice_create'
      ];
      return view('invoice.create', $params);
   }


   public function store(Request $request)
   {
      $request->validate(['customer_id' => 'required', 'numero' => 'required', 'data' => 'required']);

      $invoice_items = \Session::get('invoice_items');
      if(!$invoice_items)
      {
         return ['result' => 0, 'msg' => 'non ci sono elementi da fatturare'];
      }

      $totale_imponibile = 0;
      $imposta = 0;

      foreach($invoice_items as $item)
      {

         $imponibile = str_replace(",",".",$item->imponibile);
         $totale_imponibile = $totale_imponibile + $imponibile ;
      }

      try{
         $invoice = new Invoice();
         $invoice->imponibile = $totale_imponibile;
         $invoice->totale = $totale_imponibile;
         $invoice->imposta = 0;
         $invoice->numero = $request->get('numero');
         $invoice->customer_id = $request->get('customer_id');
         $invoice->data = $request->get('data');
         $invoice->pagamento = 'Bonifico Bancario';
         $invoice->anno = date('Y');
         $invoice->save();

         foreach($invoice_items as $item)
         {
            $invoice_item = new InvoiceItem();
            $invoice_item->invoice_id = $invoice->id;
            $invoice_item->iva = 22;
            $invoice_item->imponibile = str_replace(",",".",$item->imponibile);
            $invoice_item->totale = str_replace(",",".",$item->imponibile);
            $invoice_item->qty = 1;
            $invoice_item->desc = $item->desc;
            $invoice_item->work_id = $item->work_id;
            $invoice_item->save();
         }
         return ['result' => 1, 'msg' => 'Elemento creato con successo','url'=> route('invoices')];

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
      $invoice = Invoice::find($id);
      if(!$invoice){
         return back()->with('error','Elemento non trovato');
      }
      $invoice_items = $invoice->invoiceItems;
      if($invoice_items)
      {
         foreach($invoice_items as $item)
         {
            $item->delete();
         }
      }
      $invoice->delete();
      return back()->with('success','Elemento eliminato con successo');
   }
}
