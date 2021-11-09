<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('ragione_sociale');
            $table->text('indirizzo');
            $table->string('p_iva');
            $table->string('codice_fiscale')->nullable();
            $table->string('tel')->nullable();
            $table->timestamps();
        });

       // Insert some stuff
       DB::table('customers')->insert(
          [
             ['id' => 1, 'ragione_sociale' => 'In Your Life s.r.l.', 'p_iva' => '05530700482', 'codice_fiscale'=>'', 'indirizzo' => 'via Dante Alighieri 10 50055 - Lastra a Signa', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
             ['id' => 2, 'ragione_sociale' => 'FjStudio di Iacopini Fabrizio', 'p_iva' => '01489500478' ,'codice_fiscale' => 'CPNFRZ74H11G702P', 'indirizzo' => 'via Ciro Menotti,44 50059 Vinci (FI)', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],
             ['id' => 3, 'ragione_sociale' => 'K-byte s.r.l.', 'p_iva' => '06279530486', 'codice_fiscale' =>'','indirizzo' => 'via della Noce,1 50053 Empoli (FI)', 'created_at' => DB::raw('CURRENT_TIMESTAMP')],

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
        Schema::dropIfExists('customers');
    }
}
