<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('master_cuti_views')->insert([
            ['kode'=>"CKH", 'keterangan' => "Cuti Potong Gaji"],
            ['kode'=>"CTH", 'keterangan' => "Cuti Tahunan"],
            ['kode'=>"DLL CTH", 'keterangan' => "Cuti"],
            ['kode'=>"DLL DNL", 'keterangan' => "Dinas Luar"],
            ['kode'=>"DLL EVN", 'keterangan' => "Event"],
            ['kode'=>"DLL HDR", 'keterangan' => "Hadir"],
            ['kode'=>"DLL IJF", 'keterangan' => "Ijin Full 1 Hari"],
            ['kode'=>"DLL IJS", 'keterangan' => "Ijin Setengah Hari"],
            ['kode'=>"DLL KCL", 'keterangan' => "Kecelakaan"],
            ['kode'=>"DLL LUPA", 'keterangan' => "Lupa Absen"],
            ['kode'=>"DLL SKT", 'keterangan' => "Sakit"],
            ['kode'=>"DLL SKTCVD", 'keterangan' => "Sakit Covid"],
            ['kode'=>"DLL TK", 'keterangan' => "Tugas Kantor"],
            ['kode'=>"DLL TRN", 'keterangan' => "Tanpa Keterangan"],
        ]);
    }
}
