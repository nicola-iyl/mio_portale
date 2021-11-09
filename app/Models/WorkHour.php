<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed work_id
 * @property mixed qty
 * @property mixed desc
 * @property mixed data
 * @property mixed status
 */
class WorkHour extends Model
{
   use HasFactory;

   protected $dates = ['data'];

   protected $fillable = [
      'id',
      'work_id',
      'qty',
      'desc',
      'data',
      'status',
   ];

   public function work()
   {
      return $this->belongsTo(Work::class);
   }
}
