<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed invoice_id
 * @property mixed work_id
 * @property mixed desc
 * @property mixed qty
 * @property mixed imponibile
 * @property mixed iva
 * @property mixed totale
 */
class InvoiceItem extends Model
{
   use HasFactory;

   protected $fillable = [
      'id',
      'invoice_id',
      'work_id',
      'desc',
      'qty',
      'imponibile',
      'iva',
      'totale'
   ];

   public function invoice()
   {
      return $this->belongsTo(Invoice::class);
   }

   public function work()
   {
      return $this->belongsTo(Work::class);
   }
}
