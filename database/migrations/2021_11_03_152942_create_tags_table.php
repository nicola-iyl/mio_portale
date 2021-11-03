<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

       // Insert some stuff
       DB::table('tags')->insert(
          [
             ['name' => 'array', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
             ['name' => 'artisan', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
             ['name' => 'npm', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
             ['name' => 'composer', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
             ['name' => 'object', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
             ['name' => 'foreach', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
             ['name' => 'for', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
             ['name' => 'redirect', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
             ['name' => 'https', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
             ['name' => 'funzioni', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
             ['name' => 'callback', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
             ['name' => 'promise', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
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
        Schema::dropIfExists('tags');
    }
}
