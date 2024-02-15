<?php

namespace App\Http\Controllers;

use App\Models\master_cuti;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admintable()
    {
        return view('admin.admin-table');
    }

    public function updatecuti()
    {
        return view('admin.update-cuti');
    }
}
