<?php

namespace App\Http\Controllers;

use App\Models\MutasiBarang;
use App\Models\Rekening;
use Illuminate\Http\Request;
use DataTables;

class MutasiBarangController extends Controller
{
    public function index()
    {
        return view('pages.mutasi-barang.index');
    }

    public function createView()
    {
        return view('pages.mutasi-barang.create');
    }

    public function createAction(Request $request)
    {
        $this->validate($request, [
            'sumber_dana' => 'required',
            'tujuan_penerima' => 'required',
            'total_harga_mutasi' => 'required|numeric'
        ]);

        MutasiBarang::create([
            'sumber_dana' => $request->sumber_dana,
            'tujuan_penerima' => $request->tujuan_penerima,
            'total_harga_mutasi' => $request->total_harga_mutasi
        ]);

        return redirect()->route('mutasi-barang.index');
    }

    public function updateView($id)
    {
        $mutasi_barang = MutasiBarang::where('id', '=', $id)->first();
        $sumber_dana = ['APBD', 'BLUD', 'HIBAH', 'BTT', 'DROPPING'];

        return view('pages.mutasi-barang.update', [
            'mutasi_barang' => $mutasi_barang,
            'sumber_dana' => $sumber_dana
        ]);
    }

    public function updateAction(Request $request, $id)
    {
        $this->validate($request, [
            'sumber_dana' => 'required',
            'tujuan_penerima' => 'required',
            'total_harga_mutasi' => 'required|numeric'
        ]);

        $mutasi_barang = MutasiBarang::where('id', '=', $id)->first();

        $mutasi_barang->update([
            'sumber_dana' => $request->sumber_dana,
            'tujuan_penerima' => $request->tujuan_penerima,
            'total_harga_mutasi' => $request->total_harga_mutasi
        ]);

        return redirect()->route('mutasi-barang.index');
    }

    public function detail($id)
    {
        $mutasi_barang = MutasiBarang::where('id', '=', $id)->first();

        return view('pages.mutasi-barang.detail', [
            'mutasi_barang' => $mutasi_barang
        ]);
    }

    public function delete($id)
    {
        $mutasi_barang = MutasiBarang::where('id', '=', $id)->first();
        $mutasi_barang->delete();

        return redirect()->back();
    }

    public function datatables()
    {
        $model = MutasiBarang::get(['id', 'sumber_dana', 'tujuan_penerima', 'total_harga_mutasi']);

        return DataTables::of($model)
            ->addIndexColumn()
            ->toJson();
    }
}
