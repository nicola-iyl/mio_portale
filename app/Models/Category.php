<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

   protected $fillable = [
      'name',
      'category_id',
      'status',
   ];

   public function category()
   {
      return $this->belongsTo(Category::class);
   }

   public function posts()
   {
      return $this->hasMany(Post::class);
   }
}
