<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('nombre',30)->nullable($value = false);
            $table->string('apellido',30)->nullable($value = false);
            $table->string('cedula',20)->nullable();
            $table->string('telefono',30)->nullable();
            $table->string('correo',100)->nullable();
            $table->string('razonsocial',150)->nullable();
            $table->string('usuario',20);
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
        Schema::dropIfExists('clientes');
    }
}
