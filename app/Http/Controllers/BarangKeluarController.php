<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\MutasiBarang;
use App\Models\Penyedia;
use Illuminate\Http\Request;
use DataTables;

class BarangKeluarController extends Controller
{
    public function index()
    {
        return view('pages.barang-keluar.index');
    }

    public function createView()
    {
        return view('pages.barang-keluar.create');
    }

    public function createAction(Request $request)
    {
        $this->validate($request, [
            'nama_barang' => 'required',
            'sumber_dana' => 'required',
            'unit_kerja' => 'required',
            'tujuan' => 'required'
        ]);

        $barang_keluar = BarangKeluar::create([
            'nama_barang' => $request->nama_barang,
            'sumber_dana' => $request->sumber_dana,
            'unit_kerja' => $request->unit_kerja,
            'tujuan' => $request->tujuan
        ]);

        MutasiBarang::create([
            'sumber_dana' => $barang_keluar->sumber_dana,
            'id_rekening' => 0,
            'tujuan_penerima' => $barang_keluar->tujuan,
            'total_harga_mutasi' => 0
        ]);

        return redirect()->route('barang-keluar.index');
    }

    public function updateView($id)
    {
        $barang_keluar = BarangKeluar::where('id', '=', $id)->first();
        $sumber_dana = ['APBD', 'BLUD', 'HIBAH', 'BTT', 'DROPPING'];

        return view('pages.barang-keluar.update', [
            'barang_keluar' => $barang_keluar,
            'sumber_dana' => $sumber_dana
        ]);
    }

    public function updateAction(Request $request, $id)
    {
        $this->validate($request, [
            'nama_barang' => 'required',
            'sumber_dana' => 'required',
            'unit_kerja' => 'required',
            'tujuan' => 'required'
        ]);

        $barang_keluar = BarangKeluar::where('id', '=', $id)->first();

        $barang_keluar->update([
            'nama_barang' => $request->nama_barang,
            'sumber_dana' => $request->sumber_dana,
            'unit_kerja' => $request->unit_kerja,
            'tujuan' => $request->tujuan
        ]);

        return redirect()->route('barang-keluar.index');
    }

    public function detail($id)
    {
        $barang_keluar = BarangKeluar::where('id', '=', $id)->first();

        return view('pages.barang-keluar.detail', [
            'barang_keluar' => $barang_keluar
        ]);
    }

    public function delete($id)
    {
        $barang_keluar = BarangKeluar::where('id', '=', $id)->first();
        $barang_keluar->delete();

        return redirect()->back();
    }

    public function datatables()
    {
        $model = BarangKeluar::get();

        return DataTables::of($model)
            ->addIndexColumn()
            ->toJson();
    }
}
