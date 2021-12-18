<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Pesanan;
use App\Models\Kendaraan;

class PinjamanController extends Controller
{
    public function index()
    {
        return view('pinjaman.index');
    }

    public function showAll()
    {
        $kendaraan = Kendaraan::where('id_user', Session::get('logged_in')['id'])->get();

        $data = array();

        foreach ($kendaraan as $k) {
            $pesanan = Pesanan::where('id_kendaraan', $k->id)->where('persetujuan', 1)->where('selesai', null)->orwhere('persetujuan', NULL)->get();

            foreach ($pesanan as $p) {
                $data[] = array(
                    'invoice' => $p->invoice,
                    'penyewa' => $p->user->nama_lengkap,
                    'kendaraan' => $p->kendaraan->nama_kendaraan,
                    'telepon' => $p->user->telepon,
                    'persetujuan' => $p->persetujuan
                );
            }
        }

        return response()->json($data);
    }

    public function tolak(Request $request)
    {
        $cek = Pesanan::where('invoice', $request->invoice)->update(['persetujuan' => 2]);

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function tolakCount()
    {
        $kendaraan = Kendaraan::where('id_user', Session::get('logged_in')['id'])->get();

        $data = [];

        foreach ($kendaraan as $k) {
            $countPesanan = Pesanan::where('id_kendaraan', $k->id)->where('persetujuan', 2)->count();

            $data[] = [
                'kendaraan' => $k->nama_kendaraan,
                'jumlah' => $countPesanan
            ];
        }

        return response()->json($data);
    }

    public function setuju(Request $request)
    {
        $cek = Pesanan::where('invoice', $request->invoice)->update(['persetujuan' => 1]);

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function selesai(Request $request)
    {
        $cek = Pesanan::where('invoice', $request->invoice)->update(['selesai' => 1]);

        if ($cek) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function selesaiCount()
    {
        $kendaraan = Kendaraan::where('id_user', Session::get('logged_in')['id'])->get();

        $data = [];

        foreach ($kendaraan as $k) {
            $countPesanan = Pesanan::where('id_kendaraan', $k->id)->where('selesai', 1)->count();

            $data[] = [
                'kendaraan' => $k->nama_kendaraan,
                'jumlah' => $countPesanan
            ];
        }

        return response()->json($data);
    }
}
