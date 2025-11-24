<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true); 
            $table->timestamps();
        });

        // 2. TABLA HIJA: Las variantes específicas 
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            
            // Relación con el padre 
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            
            // Atributos Específicos
            $table->string('size');              
            $table->string('color')->nullable(); 
            $table->string('material')->nullable(); 
            
            // Datos Críticos de Negocio
            $table->decimal('cost', 10, 2)->default(0); // Costo (para calcular ganancia futura)
            $table->decimal('price', 10, 2);            // Precio de Venta
            $table->integer('stock')->default(0);       // STOCK ACTUAL
            $table->integer('stock_alert')->default(5); // Alerta de stock bajo
            
            // Código único (SKU)
            $table->string('sku')->unique()->nullable(); 
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_variants');
        Schema::dropIfExists('products');
    }
};