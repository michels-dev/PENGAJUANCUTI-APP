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
        Schema::create('sdm_cuti', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 20);
            $table->date('tanggal_mulai');
            $table->tinyInteger('approval')->nullable();
            $table->date('approval_date')->nullable();
            $table->text('keperluan');
            $table->string('hari', 255);
            $table->string('tipe', 255);
            $table->string('pengganti', 255);
            $table->text('query_update')->nullable();
            $table->text('query_delete')->nullable();
            $table->text('bukti_dokumen');
            $table->integer('flag_pump')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdm_cuti');
    }
};
