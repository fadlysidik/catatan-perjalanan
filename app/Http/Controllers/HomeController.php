<?php

namespace App\Http\Controllers;

use App\Models\CatatanPerjalanan;
use App\Models\penduduk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['catatanperjalanans'] = CatatanPerjalanan::get();

        $data['histories'] = penduduk::get();
        return view('admin.index')->with($data);
    }
}
