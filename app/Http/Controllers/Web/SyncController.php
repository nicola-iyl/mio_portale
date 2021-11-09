<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Customer;
use App\Models\WorkHour;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class SyncController extends Controller
{
    public function syncWorks()
    {
       \DB::table('works')->truncate();

       $vecchi = \DB::table('t_lavori')->get();

       foreach ($vecchi as $data) {
          try {
             $item = new Work();
             $item->id = $data->ItemId;
             $item->customer_id = $data->ClienteId;
             $item->name = $data->Nome;
             $item->desc = $data->Descrizione;
             if($data->Data != '0000-00-00'){ $item->data = $data->Data; }

             $item->status = $data->Stato;
             $item->save();

          } catch (\Exception $e) {
             return back()->with('error', $e->getMessage());
          }
       }
       return back()->with('success', 'Tabella aggiornata con successo!');
    }

   public function syncWorkHours()
   {
      \DB::table('work_hours')->truncate();

      $vecchi = \DB::table('t_ore_lavoro')->get();

      foreach ($vecchi as $data) {
         try {
            $item = new WorkHour();
            $item->id = $data->ItemId;
            if($data->Data != '0000-00-00'){ $item->data = $data->Data; }
            $item->work_id = $data->LavoroId;
            $item->status = $data->Stato;
            $item->desc = $data->Descrizione;
            $item->qty = $data->Quantity;
            $item->save();

         } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
         }
      }
      return back()->with('success', 'Tabella aggiornata con successo!');
   }

   public function syncInvoices()
   {
      \DB::table('invoices')->truncate();

      $vecchi = \DB::table('t_fatture')->get();

      foreach ($vecchi as $data) {
         try {
            $item = new Invoice();
            $item->id = $data->ItemId;
            $item->data = $data->Data;
            $item->anno = $data->Anno;
            $item->customer_id = $data->ClienteId;
            $item->numero = $data->Numero;
            $item->pagamento = $data->Pagamento;
            $item->imponibile = $data->Imponibile;
            $item->imposta = $data->Imposta;
            $item->totale = $data->Totale;
            $item->save();

         } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
         }
      }
      return back()->with('success', 'Tabella aggiornata con successo!');
   }

   public function syncInvoiceItems()
   {
      \DB::table('invoice_items')->truncate();

      $vecchi = \DB::table('t_fatture_item')->get();

      foreach ($vecchi as $data) {
         try {
            $item = new InvoiceItem();
            $item->id = $data->ItemId;
            $item->invoice_id = $data->FatturaId;
            $item->work_id = $data->LavoroId;
            $item->desc = $data->Lavoro;
            $item->imponibile = $data->Imponibile;
            $item->qty = $data->Quantity;
            $item->iva = 22;
            $item->totale = $data->Totale;
            $item->save();

         } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
         }
      }
      return back()->with('success', 'Tabella aggiornata con successo!');
   }
}
