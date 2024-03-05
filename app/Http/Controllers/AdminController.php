<?php

namespace App\Http\Controllers;

use App\Models\sdm_cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function datacuti()
    {
        $currentDate = Carbon::now();

        $date = Carbon::now()->subMonth();

        if ($currentDate->day > 15) {
            $date=Carbon::now();
        }

        $startDate = $date->copy()->startOfMonth()->addDays(14);
        $endDate = $date->copy()->endOfMonth()->addDays(16);

        $data = sdm_cuti::where('tanggal_mulai', '>=', $startDate)
        ->where('tanggal_mulai', '<=', $endDate)
        ->get();
        // dd($data);

        return view('admin.data-cuti', compact('data'));
    }

    public function report()
    {

        $currentDate = Carbon::now();

        $endDate = Carbon::now()->subMonth()->startOfMonth()->addDays(14);

        if ($currentDate->day > 15) {
                 $endDate=Carbon::now()->startOfMonth()->addDays(14);
        }

        $data = sdm_cuti::where('tanggal_mulai', '<=', $endDate)
                ->get();
        // dd($endDate);

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
