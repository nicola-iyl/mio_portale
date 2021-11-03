<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('categories', function (Blueprint $table)
      {
         $table->id();
         $table->integer('category_id')->nullable();
         $table->string('name');
         $table->tinyInteger('status')->default(1);
         $table->timestamps();
      });

      // Insert some stuff
      DB::table('categories')->insert(
         [
            ['name' => 'Php', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
            ['name' => 'Css', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
            ['name' => 'React', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
            ['name' => 'React-Native', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
            ['name' => 'Angular', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
            ['name' => 'Vue', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
            ['name' => 'Html', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
         ]
      );
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('categories');
   }
}
