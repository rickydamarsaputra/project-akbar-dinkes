<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Penyedia;
use Illuminate\Http\Request;
use DataTables;

class BarangMasukController extends Controller
{
    public function index()
    {
        return view('pages.barang-masuk.index');
    }

    public function createView()
    {
        $penyedia = Penyedia::get(['nama_penyedia']);

        return view('pages.barang-masuk.create', [
            'penyedia' => $penyedia
        ]);
    }

    public function createAction(Request $request)
    {
        $this->validate($request, [
            'nama_barang' => 'required',
            'sumber_dana' => 'required',
            'unit_kerja' => 'required',
            'nama_penyedia' => 'required',
            'total_harga_barang_masuk' => 'required|numeric'
        ]);

        BarangMasuk::create([
            'nama_barang' => $request->nama_barang,
            'sumber_dana' => $request->sumber_dana,
            'unit_kerja' => $request->unit_kerja,
            'nama_penyedia' => $request->nama_penyedia,
            'total_harga_barang_masuk' => $request->total_harga_barang_masuk
        ]);

        return redirect()->route('barang-masuk.index');
    }

    public function updateView($id)
    {
        $barang_masuk = BarangMasuk::where('id', '=', $id)->first();
        $sumber_dana = ['APBD', 'BLUD', 'HIBAH', 'BTT', 'DROPPING'];
        $penyedia = Penyedia::get(['nama_penyedia']);

        return view('pages.barang-masuk.update', [
            'barang_masuk' => $barang_masuk,
            'sumber_dana' => $sumber_dana,
            'penyedia' => $penyedia
        ]);
    }

    public function updateAction(Request $request, $id)
    {
        $this->validate($request, [
            'nama_barang' => 'required',
            'sumber_dana' => 'required',
            'unit_kerja' => 'required',
            'nama_penyedia' => 'required',
            'total_harga_barang_masuk' => 'required|numeric'
        ]);

        $barang_masuk = BarangMasuk::where('id', '=', $id)->first();

        $barang_masuk->update([
            'nama_barang' => $request->nama_barang,
            'sumber_dana' => $request->sumber_dana,
            'unit_kerja' => $request->unit_kerja,
            'nama_penyedia' => $request->nama_penyedia,
            'total_harga_barang_masuk' => $request->total_harga_barang_masuk
        ]);

        return redirect()->route('barang-masuk.index');
    }

    public function detail($id)
    {
        $barang_masuk = BarangMasuk::where('id', '=', $id)->first();

        return view('pages.barang-masuk.detail', [
            'barang_masuk' => $barang_masuk
        ]);
    }

    public function delete($id)
    {
        $barang_masuk = BarangMasuk::where('id', '=', $id)->first();
        $barang_masuk->delete();

        return redirect()->back();
    }

    public function datatables()
    {
        $model = BarangMasuk::get();

        return DataTables::of($model)
            ->addIndexColumn()
            ->toJson();
    }
}
