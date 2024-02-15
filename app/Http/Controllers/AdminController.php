<?php

namespace App\Http\Controllers;

use App\Models\master_cuti;
use App\Models\sdm_cuti;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admintable()
    {
        $data = sdm_cuti::where('tanggal_mulai', '>=', now())->get();
        return view('admin.admin-table', compact('data'));
    }

    public function updatecuti()
    {
        return view('admin.update-cuti');
    }
}
