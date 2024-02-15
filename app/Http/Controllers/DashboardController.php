<?php

namespace App\Http\Controllers;

use App\Models\master_cuti;
use App\Models\sdm_cuti;
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' =>'required',
            'tipe' =>'required',
            'hari' =>'required',
            'tanggal_mulai' =>'required',
            'keperluan' =>'required',
            'pengganti' =>'required',
            'bukti_dokumen' =>'required',
        ]);

        sdm_cuti::create([
            'nik' =>$validatedData['nik'],
            'tipe' =>$validatedData['tipe'],
            'hari' =>$validatedData['hari'],
            'tanggal_mulai' =>$validatedData['tanggal_mulai'],
            'keperluan' =>$validatedData['keperluan'],
            'pengganti' =>$validatedData['pengganti'],
            'bukti_dokumen' =>$validatedData['bukti_dokumen'],
        ]);
        return redirect()->route('dashboard.index');
    }
}
