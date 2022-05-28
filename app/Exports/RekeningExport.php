<?php

namespace App\Exports;

use App\Models\Rekening;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class RekeningExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        $rekening = Rekening::get();

        return view('exports.rekening', [
            'rekening' => $rekening
        ]);
    }
}
