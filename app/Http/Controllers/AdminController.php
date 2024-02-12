<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexadmin(Request $request)
    {
        return view('admin.index-admin');
    }

    public function formcuti()
    {
        return view('admin.form-cuti');
    }
}
