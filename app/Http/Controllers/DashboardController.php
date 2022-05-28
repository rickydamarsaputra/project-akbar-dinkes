<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Penyedia;
use App\Models\Rekening;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $saldo_awal = Rekening::select('saldo_rekening')->sum('saldo_rekening');
        $saldo_akhir = BarangMasuk::select('total_harga_barang_masuk')->sum('total_harga_barang_masuk');

        $total_barang = BarangMasuk::count();
        $total_penyedia = Penyedia::count();

        return view('pages.dashboard.index', [
            'saldo_awal' => $saldo_awal,
            'saldo_akhir' => $saldo_akhir,
            'total_barang' => $total_barang,
            'total_penyedia' => $total_penyedia
        ]);
    }
}
