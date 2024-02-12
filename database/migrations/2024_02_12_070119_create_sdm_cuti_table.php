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
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_akhir');
            $table->boolean('approval')->default(false);
            $table->dateTime('approval_date');
            $table->text('keperluan');
            $table->string('hari', 255);
            $table->string('tipe', 255);
            $table->string('pengganti', 255);
            $table->text('query_update');
            $table->text('query_delete');
            $table->string('approver', 255);
            $table->text('bukti_dokumen');
            $table->integer('flag_pump');
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
