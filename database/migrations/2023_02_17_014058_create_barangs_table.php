<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id',20);
            $table->string('no_palet',100);
            $table->string('invoice',100)->unique();
            $table->date('tglmasuk');
            $table->date('tglpindah');
            $table->string('lorong',100);
            $table->enum('status', ['tersedia', 'tidak']);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
