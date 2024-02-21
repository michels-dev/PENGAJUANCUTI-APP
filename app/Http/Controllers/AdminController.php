<?php

namespace App\Http\Controllers;

use App\Models\sdm_cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function admintable()
    {
        $data = sdm_cuti::whereDate('tanggal_selesai', '>=', today())->get();
        // dd($data);
        return view('admin.admin-table', compact('data'));
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
            return redirect()->route('admin.admin-table');
        }

        // Redirect kembali ke halaman sebelumnya atau halaman tertentu
        return redirect()->route('admin.admin-table');
    }

    public function destroy($id)
    {
        $data = sdm_cuti::find($id);

        $data->delete();

        return redirect()->route('admin.admin-table');
    }

    public function cancel(Request $request, $id)
    {
        // Update record dengan tanggal_mulai yang baru
        sdm_cuti::where('id', $id)->update([
            'approval' => null, // Mengatur ulang approval menjadi null
            'approval_date' => null,
        ]);

        return redirect()->route('admin.admin-table');
    }
}
