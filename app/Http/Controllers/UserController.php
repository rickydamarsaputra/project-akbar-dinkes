<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.user.index');
    }

    public function createView()
    {
        return view('pages.user.create');
    }

    public function createAction(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('user.index');
    }

    public function updateView($id)
    {
        $user = User::where('id', '=', $id)->first();

        return view('pages.user.update', [
            'user' => $user
        ]);
    }

    public function updateAction(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required'
        ]);

        $user = User::where('id', '=', $id)->first();

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('user.index');
    }

    public function delete($id)
    {
        $user = User::where('id', '=', $id)->first();
        $user->delete();

        return redirect()->back();
    }

    public function datatables()
    {
        $model = User::get(['id', 'username', 'email']);

        return DataTables::of($model)
            ->addIndexColumn()
            ->toJson();
    }
}
