<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed ragione_sociale
 * @property mixed indirizzo
 * @property mixed p_iva
 * @property mixed tel
 * @property mixed $codice_fiscale
 */
class Customer extends Model
{
   use HasFactory;

   protected $fillable = [
      'id',
      'ragione_sociale',
      'indirizzo',
      'p_iva',
      'codice_fiscale',
      'tel'
   ];

   public function invoices()
   {
      return $this->hasMany(Invoice::class);
   }
}
