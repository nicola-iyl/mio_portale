<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed post_id
 * @property mixed desc
 * @property mixed code
 */
class Script extends Model
{
    use HasFactory;

   protected $fillable = [
      'post_id',
      'desc',
      'code'
   ];

   public function post()
   {
      return $this->belongsTo(Post::class);
   }
}
