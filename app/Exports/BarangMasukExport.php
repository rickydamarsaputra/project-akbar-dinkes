<?php

namespace App\Exports;

use App\Models\BarangMasuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class BarangMasukExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        $barang_masuk = BarangMasuk::get();

        return view('exports.barang-masuk', [
            'barang_masuk' => $barang_masuk
        ]);
    }
}
