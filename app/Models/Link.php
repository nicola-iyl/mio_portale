<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed post_id
 * @property mixed name
 * @property mixed url
 */
class Link extends Model
{
    use HasFactory;

   protected $fillable = [
      'post_id',
      'name',
      'url'
   ];

   public function post()
   {
      return $this->belongsTo(Post::class);
   }
}
