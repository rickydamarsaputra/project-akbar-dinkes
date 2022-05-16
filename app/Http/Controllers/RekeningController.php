<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;
use DataTables;

class RekeningController extends Controller
{
    public function index()
    {
        return view('pages.rekening.index');
    }

    public function createView()
    {
        return view('pages.rekening.create');
    }

    public function createAction(Request $request)
    {
        $this->validate($request, [
            'no_rekening' => 'required|numeric',
            'saldo_rekening' => 'required|numeric'
        ]);

        Rekening::create([
            'no_rekening' => $request->no_rekening,
            'saldo_rekening' => $request->saldo_rekening
        ]);

        return redirect()->route('rekening.index');
    }

    public function updateView($id)
    {
        $rekening = Rekening::where('id_rekening', '=', $id)->first();

        return view('pages.rekening.update', [
            'rekening' => $rekening
        ]);
    }

    public function updateAction(Request $request, $id)
    {
        $this->validate($request, [
            'no_rekening' => 'required|numeric',
            'saldo_rekening' => 'required|numeric'
        ]);

        $rekening = Rekening::where('id_rekening', '=', $id)->first();

        $rekening->update([
            'no_rekening' => $request->no_rekening,
            'saldo_rekening' => $request->saldo_rekening
        ]);

        return redirect()->route('rekening.index');
    }

    public function detail($id)
    {
        $rekening = Rekening::where('id_rekening', '=', $id)->first();

        return view('pages.rekening.detail', [
            'rekening' => $rekening
        ]);
    }

    public function delete($id)
    {
        $rekening = Rekening::where('id_rekening', '=', $id)->first();
        $rekening->delete();

        return redirect()->back();
    }

    public function datatables()
    {
        $model = Rekening::get(['id_rekening', 'no_rekening', 'saldo_rekening']);

        return DataTables::of($model)
            ->addIndexColumn()
            ->toJson();
    }
}
