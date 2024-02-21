<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterCutiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('master_cuties')->insert([
            [
                'kode' => 'CKH',
                'keterangan' => 'Cuti Potong Gaji',
                'potong_cuti' => 0,
            ],
            [
                'kode' => 'CTH',
                'keterangan' => 'Cuti Tahunan',
                'potong_cuti' => 1,
            ],
            [
                'kode' => 'DLL:CTH',
                'keterangan' => 'Cuti',
                'potong_cuti' => 1,
            ],
            [
                'kode' => 'DLL:DNL',
                'keterangan' => 'Dinas Luar',
                'potong_cuti' => 0,
            ],
            [
                'kode' => 'DLL:EVN',
                'keterangan' => 'Event',
                'potong_cuti' => 0,
            ],
            [
                'kode' => 'DLL:HDR',
                'keterangan' => 'Hadir',
                'potong_cuti' => 0,
            ],
            [
                'kode' => 'DLL:IJF',
                'keterangan' => 'Ijin Full 1 Hari',
                'potong_cuti' => 1,
            ],
            [
                'kode' => 'DLL:IJS',
                'keterangan' => 'Ijin Setengah Hari',
                'potong_cuti' => 0,
            ],
            [
                'kode' => 'DLL:KCL',
                'keterangan' => 'Kecelakaan',
                'potong_cuti' => '',
            ],
            [
                'kode' => 'DLL:LUPA',
                'keterangan' => 'Lupa Absen',
                'potong_cuti' => 0,
            ],
            [
                'kode' => 'DLL:SKT',
                'keterangan' => 'Sakit',
                'potong_cuti' => 0,
            ],
            [
                'kode' => 'DLL:SKTCVD',
                'keterangan' => 'Sakit Covid',
                'potong_cuti' => 0,
            ],
            [
                'kode' => 'DLL:TK',
                'keterangan' => 'Tugas Kantor',
                'potong_cuti' => 0,
            ],
            [
                'kode' => 'DLL:TRN',
                'keterangan' => 'Tanpa Keterangan',
                'potong_cuti' => 1,
            ],
        ]);
    }
}
