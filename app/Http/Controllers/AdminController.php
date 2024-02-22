<?php

namespace App\Http\Controllers;

use App\Models\sdm_cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function datacuti()
    {
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

        // Mengambil data berdasarkan rentang tanggal
        $data = sdm_cuti::whereDate('tanggal_mulai', '>=', $start_date)->whereDate('tanggal_mulai', '<=', $end_date)->get();

        return view('admin.data-cuti', compact('data'));
    }

    public function report()
    {
        // Mendapatkan tanggal saat ini
        $today = now();

        // Menghitung tanggal 16 bulan ini
        $start_date = $today->copy()->startOfMonth()->addDays(15);

        // Menghitung tanggal 15 bulan depan
        $end_date = $today->copy()->endOfMonth()->addDay()->addMonth()->subDays(15);

        // Jika tanggal saat ini kurang dari tanggal 16, gunakan bulan sebelumnya sebagai awal
        if ($today->day < 16) {
            $start_date = $start_date->subMonth();
            $end_date = $end_date->subMonth();
        }

        // Mengambil data cuti yang sesuai dengan rentang tanggal
        $data = sdm_cuti::whereDate('tanggal_mulai', '<', $start_date)
                        ->orWhereDate('tanggal_mulai', '>', $end_date)
                        ->get();

        return view('admin.data-report', compact('data'));
    }


    public function updatecuti()
    {
        return view('admin.update-cuti');
    }

    public function approvalcuti(Request $request, $id)
    {
        $data = sdm_cuti::findOrFail($id);

        // Lakukan pengecekan tindakan yang dipilih
        if ($request->action == 'approve') {
            // simpan approval date
            $approval_date = date('Y-m-d', strtotime($request->approval_date));
            $data->approval_date = $approval_date;

            $data->update(['approval' => 1]);
            $message = 'Pengajuan Cuti Telah Disetujui';
        } elseif ($request->action == 'reject') {
            // simpan approval date
            $approval_date = date('Y-m-d', strtotime($request->approval_date));
            $data->approval_date = $approval_date;

            $data->update(['approval' => 0]);
            $message = 'Pengajuan Cuti Tidak Disetujui';
        } else {
            // Jika tindakan tidak valid, kembalikan response dengan error
            return redirect()->route('admin.data-cuti');
        }

        // Redirect kembali ke halaman sebelumnya atau halaman tertentu
        return redirect()->route('admin.data-cuti');
    }

    public function destroy($id)
    {
        $data = sdm_cuti::find($id);

        $data->delete();

        return redirect()->route('admin.data-cuti');
    }

    public function cancel(Request $request, $id)
    {
        // Update record dengan tanggal_mulai yang baru
        sdm_cuti::where('id', $id)->update([
            'approval' => null, // Mengatur ulang approval menjadi null
            'approval_date' => null,
        ]);

        return redirect()->route('admin.data-cuti');
    }
}
