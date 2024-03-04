<?php

namespace App\Http\Controllers;

use App\Models\master_cuti;
use App\Models\sdm_cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if($user->isAdmin()){
                    // visualisasi data
        $pending = sdm_cuti::where('approval', null)->count();
        $approved = sdm_cuti::where('approval', 1)->count();
        $rejected = sdm_cuti::where('approval', 0)->count();
        }
        else {

            $pending = sdm_cuti::where('user_created', Auth::user()->email)->where('approval', null)->count();
            $approved = sdm_cuti::where('user_created', Auth::user()->email)->where('approval', 1)->count();
            $rejected = sdm_cuti::where('user_created', Auth::user()->email)->where('approval', 0)->count();

        }

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
            'bukti_dokumen' =>'nullable',
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
        $user = Auth::user();

        $currentDate = Carbon::now();

        $date = Carbon::now()->subMonth();

        if ($currentDate->day > 15) {
            $date=Carbon::now();
        }

        $startDate = $date->copy()->startOfMonth()->addDays(14);
        $endDate = $date->copy()->endOfMonth()->addDays(16);
        // dd($data);

        // Jika admin login
        if ($user->isAdmin()){
            $data = sdm_cuti::where('tanggal_mulai', '>=', $startDate)
            ->where('approval', null)
            ->where('tanggal_mulai', '<=', $endDate)
            ->get();
        }
        // Jika users login
        else {
            $data = sdm_cuti::where('user_created', Auth::user()->email)
            ->where('approval', null)
            ->where('tanggal_mulai', '>=', $startDate)
            ->where('tanggal_mulai', '<=', $endDate)
            ->get();
        }
        return view('dashboard.table-onhold', compact('data'));
    }

    public function approved()
    {
        $user = Auth::user();

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

        // Jika admin login
        if ($user->isAdmin()){
            $data = sdm_cuti::whereDate('tanggal_mulai', '>=', $start_date)
            ->where('approval', 1)
            ->whereDate('tanggal_mulai', '<=', $end_date)->get();
        }
        // Jika users login
        else {
            $data = sdm_cuti::where('user_created', Auth::user()->email)
            ->where('approval', 1)
            ->whereDate('tanggal_mulai', '>=', $start_date)
            ->whereDate('tanggal_mulai', '<=', $end_date)->get();
        }
        return view('dashboard.table-approved', compact('data'));
    }

    public function rejected()
    {
        $user = Auth::user();

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

        // Jika admin login
        if ($user->isAdmin()){
            $data = sdm_cuti::whereDate('tanggal_mulai', '>=', $start_date)
            ->where('approval', 0)
            ->whereDate('tanggal_mulai', '<=', $end_date)->get();
        }
        // Jika users login
        else {
            $data = sdm_cuti::where('user_created', Auth::user()->email)
            ->where('approval', 0)
            ->whereDate('tanggal_mulai', '>=', $start_date)
            ->whereDate('tanggal_mulai', '<=', $end_date)->get();
        }
        return view('dashboard.table-rejected', compact('data'));
    }
}
