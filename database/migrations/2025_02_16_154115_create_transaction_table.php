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
        Schema::create('transaction', function (Blueprint $table) {
            $table->string('id_transaction')->primary();
            $table->string('id_admin');
            $table->string('id_pembeli');
            $table->string('id_barang');
            $table->string('status');
            $table->timestamps();
            // foreign key 
            $table->foreign('id_admin')->references('id_admin')->on('admins')->onDelete('cascade');
            $table->foreign('id_pembeli')->references('id_pembeli')->on('pembeli')->onDelete('cascade');
            $table->foreign('id_barang')->references('id_barang')->on('point')->onDelete('cascade');


        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
