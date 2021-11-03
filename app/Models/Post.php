<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed category_id
 * @property mixed name
 * @property mixed desc
 * @property mixed tags
 * @property mixed id
 */
class Post extends Model
{
   use HasFactory;

   protected $fillable = [
      'name',
      'category_id',
      'desc',
      'tags'
   ];
}
