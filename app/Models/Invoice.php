<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed data
 * @property mixed numero
 * @property mixed customer_id
 * @property mixed pagamento
 * @property mixed anno
 * @property mixed imponibile
 * @property mixed imposta
 * @property mixed totale
 */
class Invoice extends Model
{
   use HasFactory;

   protected $dates = ['data'];

   protected $fillable = [
      'id',
      'data',
      'numero',
      'customer_id',
      'pagamento',
      'anno',
      'imponibile',
      'imposta',
      'totale'
   ];

   public function customer()
   {
      return $this->belongsTo(Customer::class);
   }

   public function invoiceItems()
   {
      return $this->hasMany(InvoiceItem::class);
   }
}
