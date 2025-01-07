<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('descripcion');
            $table->string('ordenes')->nullable();
            $table->string('proveedor')->nullable();
            $table->string('empresa');

            //relacionales
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->foreignId('clasificacion_id')->constrained('categoria_clasificaciones');

            //relacionales unllables
            $table->unsignedBigInteger('generica_id')->nullable();
            $table->foreign('generica_id')->references('id')->on('genericas');

            $table->unsignedBigInteger('compra_id')->nullable();
            $table->foreign('compra_id')->references('id')->on('clasificacion_sub_items');

            $table->unsignedBigInteger('insumo_id')->nullable();
            $table->foreign('insumo_id')->references('id')->on('insumos');

            $table->unsignedBigInteger('detalle_id')->nullable();
            $table->foreign('detalle_id')->references('id')->on('detalles');

            $table->unsignedBigInteger('tipocuenta_id')->nullable();
            $table->foreign('tipocuenta_id')->references('id')->on('tipo_cuentas');

            $table->unsignedBigInteger('comprobante_id')->nullable();
            $table->foreign('comprobante_id')->references('id')->on('comprobante_tipos');

            $table->unsignedBigInteger('transaccion_id')->nullable();
            $table->foreign('transaccion_id')->references('id')->on('transaccion_tipos');

            $table->double('gasto')->nullable();
            $table->double('ingreso')->nullable();
            $table->double('capital')->nullable();
            $table->double('utilidad')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
