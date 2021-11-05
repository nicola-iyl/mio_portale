<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed post_id
 * @property mixed name
 * @property mixed link
 */
class Video extends Model
{
    use HasFactory;

   protected $fillable = [
      'post_id',
      'name',
      'link'
   ];

   public function post()
   {
      return $this->belongsTo(Post::class);
   }
}
