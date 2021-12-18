<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Pesanan;

class PenyewaanController extends Controller
{
    public function index()
    {
        return view('penyewaan.index');
    }

    public function showall()
    {
        $pesanan = Pesanan::where('id_user', Session::get('logged_in')['id'])->where('persetujuan', null)->orwhere('persetujuan', 1)->where('selesai', null)->get();

        $data = array();

        foreach ($pesanan as $p) {
            $data[] = array(
                'invoice' => $p->invoice,
                'nama' => $p->kendaraan->user->nama_lengkap,
                'kendaraan' => $p->kendaraan->nama_kendaraan,
                'telepon' => $p->kendaraan->user->telepon,
                'persetujuan' => $p->persetujuan
            );
        }

        return response()->json($data);
    }
}
