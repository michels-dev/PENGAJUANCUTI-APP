<?php

namespace App\Http\Controllers;

use App\Models\sdm_cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UsersController extends Controller
{
    public function userstable()
    {

        $currentDate = Carbon::now();

        $date = Carbon::now()->subMonth();

        if ($currentDate->day > 15) {
            $date=Carbon::now();
        }

        $startDate = $date->copy()->startOfMonth()->addDays(14);
        $endDate = $date->copy()->endOfMonth()->addDays(16);

        $data = sdm_cuti::where('tanggal_mulai', '>=', $startDate)
        ->where('tanggal_mulai', '<=', $endDate)
        ->get();
        // dd($data);

        return view('users.users-table', compact('data'));
    }
}
