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
        Schema::create('juegos', function (Blueprint $table) {
            $table->id('juegos_Id');
            $table->string('titulo',150);
            $table->text('descripcion');
            $table->decimal('precio', 8, 2);
            $table->integer('cantidad_dispo');
            $table->string('imagen');
            $table->integer('plataforma_Id');
            $table->foreign('plataforma_Id')->references('plataforma_Id')->on('plataformas')->onDelete('cascade');
            $table->integer('categoria_Id');
            $table->foreign('categoria_Id')->references('categoria_Id')->on('categoria')->onDelete('cascade');
            $table->integer('proveedor_Id');
            $table->foreign('proveedor_Id')->references('proveedor_Id')->on('proveedores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juegos');
    }
};
