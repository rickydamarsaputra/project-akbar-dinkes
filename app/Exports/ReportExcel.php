<?php

namespace App\Exports;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Rekening;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportExcel implements FromView
{
    use Exportable;

    public function view(): View
    {
        $barang_masuk = BarangMasuk::get();
        $barang_keluar = BarangKeluar::get();
        $rekening = Rekening::get();

        return view('exports.report', [
            'barang_masuk' => $barang_masuk,
            'barang_keluar' => $barang_keluar,
            'rekening' => $rekening
        ]);
    }
}
