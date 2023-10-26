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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kendaraans_id')->constrained()->cascadeOnDelete();
            $table->foreignId('locations_id')->constrained()->cascadeOnDelete();
            $table->foreignId('karyawan_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreignId('supervisor_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreignId('manager_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreignId('status_manager')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreignId('status_supervisor')->references('id')->on('statuses')->onDelete('cascade');
            $table->date('tanggal_pemakaian');
            $table->date('tanggal_pengembalian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
