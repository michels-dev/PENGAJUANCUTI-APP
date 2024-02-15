<?php

namespace App\Http\Controllers;

use App\Models\master_cuti;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.index');
    }

    public function formcuti()
    {
        $masterCuti = master_cuti::all();
        return view('dashboard.form-cuti', compact('masterCuti'));
    }
}
