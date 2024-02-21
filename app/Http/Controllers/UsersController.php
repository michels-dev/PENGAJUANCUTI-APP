<?php

namespace App\Http\Controllers;

use App\Models\sdm_cuti;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function userstable()
    {
        $data = sdm_cuti::whereDate('tanggal_selesai', '>=', today())->get();
        // dd($data);
        return view('users.users-table', compact('data'));
    }
}
