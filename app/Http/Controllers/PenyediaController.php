<?php

namespace App\Http\Controllers;

use App\Models\Penyedia;
use Illuminate\Http\Request;
use DataTables;

class PenyediaController extends Controller
{
    public function index()
    {
        return view('pages.penyedia.index');
    }

    public function createView()
    {
        return view('pages.penyedia.create');
    }

    public function createAction(Request $request)
    {
        $this->validate($request, [
            'nama_penyedia' => 'required'
        ]);

        Penyedia::create([
            'nama_penyedia' => $request->nama_penyedia
        ]);

        return redirect()->route('penyedia.index');
    }

    public function updateView($id)
    {
        $penyedia = Penyedia::where('id', '=', $id)->first();

        return view('pages.penyedia.update', [
            'penyedia' => $penyedia
        ]);
    }

    public function updateAction(Request $request, $id)
    {
        $this->validate($request, [
            'nama_penyedia' => 'required'
        ]);

        $penyedia = Penyedia::where('id', '=', $id)->first();
        $penyedia->update([
            'nama_penyedia' => $request->nama_penyedia
        ]);

        return redirect()->route('penyedia.index');
    }

    public function detail($id)
    {
        $penyedia = Penyedia::where('id', '=', $id)->first();

        return view('pages.penyedia.detail', [
            'penyedia' => $penyedia
        ]);
    }

    public function delete($id)
    {
        $penyedia = Penyedia::where('id', '=', $id)->first();
        $penyedia->delete();

        return redirect()->back();
    }

    public function datatables()
    {
        $model = Penyedia::get(['id', 'nama_penyedia']);

        return DataTables::of($model)
            ->addIndexColumn()
            ->toJson();
    }
}
