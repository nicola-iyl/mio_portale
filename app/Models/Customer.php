<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   use HasFactory;

   protected $fillable = [
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
