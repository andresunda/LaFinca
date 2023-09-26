<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreignId('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status_pedido', ['preparandose', 'preparado', 'entregado', 'cancelado'])->default('preparandose');
            $table->string('total_pedido', 255);
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
        Schema::dropIfExists('pedidos');
    }
};
