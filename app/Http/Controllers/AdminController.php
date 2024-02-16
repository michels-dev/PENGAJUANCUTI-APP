<?php

namespace App\Http\Controllers;

use App\Models\master_cuti;
use App\Models\sdm_cuti;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admintable()
    {
        $data = sdm_cuti::where('tanggal_mulai', '>=', now())->get();
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
            $data->approval = 1;
            $data->approval_date = $request->input('approval_date');
            $message = 'Pengajuan Cuti Telah Disetujui';
        } elseif ($request->action == 'reject') {
            $data->approval = 0;
            $data->approval_date = $request->input('approval_date');
            $message = 'Pengajuan Cuti Tidak Disetujui';
        } else {
            // Jika tindakan tidak valid, kembalikan response dengan error
            return redirect()->route('admin.admin-table')->with('error', 'Tindakan tidak valid.');
        }

        // Simpan perubahan
        $data->save();

        // Redirect kembali ke halaman sebelumnya atau halaman tertentu
        return redirect()->route('admin.admin-table')->with('success', $message);
    }

}
