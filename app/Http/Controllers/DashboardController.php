<?php

namespace App\Http\Controllers;

use App\Models\master_cuti;
use App\Models\sdm_cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // visualisasi data
        $pending = sdm_cuti::where('approval', null)->count();
        $approved = sdm_cuti::where('approval', 1)->count();
        $rejected = sdm_cuti::where('approval', 0)->count();

        return view('dashboard.index', compact( 'approved', 'rejected', 'pending'));
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
            'tanggal_mulai' =>'required|date_format:m/d/Y',
            'tanggal_selesai' =>'required|date_format:m/d/Y',
            'keperluan' =>'required',
            'pengganti' =>'required',
            'bukti_dokumen' =>'required',
            'user_created' =>'required',
        ]);

        // Mengubah format tanggal menjadi yyyy-mm-dd
        $tanggal_mulai = date('Y-m-d', strtotime($validatedData['tanggal_mulai']));
        $tanggal_selesai = date('Y-m-d', strtotime($validatedData['tanggal_selesai']));

        sdm_cuti::create([
            'nik' =>$validatedData['nik'],
            'tipe' =>$validatedData['tipe'],
            'hari' =>$validatedData['hari'],
            'tanggal_mulai' =>$tanggal_mulai,
            'tanggal_selesai' =>$tanggal_selesai,
            'keperluan' =>$validatedData['keperluan'],
            'pengganti' =>$validatedData['pengganti'],
            'bukti_dokumen' =>$validatedData['bukti_dokumen'],
            'user_created' =>$validatedData['user_created'],
        ]);
        return redirect()->route('users.users-table')->with('success','Data persetujuan cuti anda telah berhasil ditambahkan.');
    }

    public function onhold()
    {
        $data = sdm_cuti::whereDate('tanggal_selesai', '>=', today())
                 ->where('approval', null)
                 ->get();

        return view('dashboard.table-onhold', compact('data'));
    }

    public function approved()
    {
        $data = sdm_cuti::whereDate('tanggal_selesai', '>=', today())
                 ->where('approval', 1)
                 ->get();

        return view('dashboard.table-approved', compact('data'));
    }

    public function rejected()
    {
        $data = sdm_cuti::whereDate('tanggal_selesai', '>=', today())
                 ->where('approval', 0)
                 ->get();

        return view('dashboard.table-rejected', compact('data'));
    }
}
