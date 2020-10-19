<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbejasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abejas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('empresa_id');
            $table->string('tipo_contrato');
            $table->unsignedBigInteger('user_id');
            $table->date('fecha_postura');
            $table->string('sector_polinizacion');
            $table->string('tipo_colmena');
            $table->unsignedInteger('cantidad_colmenas');
            $table->string('cultivo');
            $table->string('observaciones')->nullable();
            $table->string('responsable_entrega');
            $table->softDeletes();
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
        Schema::dropIfExists('abejas');
    }
}
