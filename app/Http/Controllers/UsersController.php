<?php

namespace App\Http\Controllers;

use App\Models\sdm_cuti;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function userstable()
    {
        // Mendapatkan tanggal saat ini
        $today = now();

        // Menghitung tanggal 16 dari bulan ini
        $start_date = $today->copy()->startOfMonth()->addDays(15);

        // Menghitung tanggal 15 dari bulan depan
        $end_date = $today->copy()->endOfMonth()->addDay()->addMonth()->subDays(15);

        // Jika tanggal hari ini lebih besar dari tanggal 15, gunakan bulan berikutnya sebagai akhir
        if ($today->day > 15) {
            $end_date = $end_date->addMonth();
        }

        // Mengambil data berdasarkan rentang tanggal
        $data = sdm_cuti::whereDate('tanggal_mulai', '>=', $start_date)->whereDate('tanggal_mulai', '<=', $end_date)->get();

        return view('users.users-table', compact('data'));
    }
}
