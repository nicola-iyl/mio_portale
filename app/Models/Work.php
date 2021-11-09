<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed customer_id
 * @property mixed name
 * @property mixed desc
 * @property mixed data
 * @property mixed status
 */
class Work extends Model
{
   use HasFactory;

   protected $dates = ['data'];

   protected $fillable = [
      'id',
      'customer_id',
      'name',
      'desc',
      'data',
      'status',
   ];

   public function customer()
   {
      return $this->belongsTo(Customer::class);
   }

   public function workHours()
   {
      return $this->hasMany(WorkHour::class);
   }

   public function oreLavorate()
   {
      //return $this->workHours()->count();
      $workHours = $this->workHours()->get();
      $ore = 0;
      if($workHours->count() > 0)
      {
         foreach($workHours as $item)
         {
            $ore = $ore + $item->qty;
         }
      }
      return $ore;
   }
}
