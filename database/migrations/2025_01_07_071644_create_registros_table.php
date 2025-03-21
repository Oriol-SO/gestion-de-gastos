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
            $table->foreignId('categoria_id')->constrained('categorias')->nullable();
            $table->foreignId('clasificacion_id')->constrained('clasificaciones')->nullable();

            //relacionales nullables
            $table->unsignedBigInteger('generica_id')->nullable();
            $table->foreign('generica_id')->references('id')->on('genericas');

            $table->unsignedBigInteger('clasificacioncompra_id')->nullable();
            $table->foreign('clasificacioncompra_id')->references('id')->on('clasificacion_compras');

            $table->unsignedBigInteger('insumo_id')->nullable();
            $table->foreign('insumo_id')->references('id')->on('insumos');

            $table->unsignedBigInteger('detalle_id')->nullable();
            $table->foreign('detalle_id')->references('id')->on('detalles');

            $table->unsignedBigInteger('cuentatipo_id')->nullable();
            $table->foreign('cuentatipo_id')->references('id')->on('cuenta_tipos');

            $table->unsignedBigInteger('comprobante_id')->nullable();
            $table->foreign('comprobante_id')->references('id')->on('comprobante_tipos');

            $table->unsignedBigInteger('transaccion_id')->nullable();
            $table->foreign('transaccion_id')->references('id')->on('transaccion_tipos');

            $table->double('gasto')->nullable();
            $table->double('ingreso')->nullable();
            $table->double('capital')->nullable();
            $table->double('utilidad')->nullable();

            $table->foreignId('usercreator_id')->constrained('users');
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
