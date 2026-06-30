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
        Schema::create('peralatan_labs', function (Blueprint $table) {
            $table->id('id_alat'); // ID Alat sebagai Primary Key
            $table->string('gambar')->nullable();
            $table->string('nama_alat');
            $table->string('jenis');
            $table->string('kondisi');
            $table->string('lokasi');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peralatan_labs');
    }
};
