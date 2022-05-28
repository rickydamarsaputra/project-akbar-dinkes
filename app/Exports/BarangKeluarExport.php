<?php

namespace App\Exports;

use App\Models\BarangKeluar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class BarangKeluarExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        $barang_keluar = BarangKeluar::get();

        return view('exports.barang-keluar', [
            'barang_keluar' => $barang_keluar
        ]);
    }
}
