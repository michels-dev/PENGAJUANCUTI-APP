<?php

namespace App\Http\Controllers;

use App\Models\master_cuti;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexadmin(Request $request)
    {
        return view('admin.index-admin');
    }

    public function formcuti()
    {
        $masterCuti = master_cuti::all();
        return view('admin.form-cuti', compact('masterCuti'));
    }
}
