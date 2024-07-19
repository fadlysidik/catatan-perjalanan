<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{

    public function index()
    {
        return view('auth.history');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        History::create($request->all());
        return redirect("dashboard")->with('success', 'Update data Histori berhasil');
    }

    public function update(Request $request, $id)
    {
        History::find($id)->update($request->all());
        return redirect('dataHistory')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        // dd($id);
        History::destroy($id);
        return redirect('dataHistory')->with('success', 'data berhasil di hapus');
    }
}
