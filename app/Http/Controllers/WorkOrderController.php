<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Barang;

class WorkOrderController extends Controller
{
    public function index()
    {
        return view('workorder.index');
    }

    public function create()
    {
        $diskon = Barang::all();
        $barang = Barang::pluck('nama_barang','nama_barang')->toArray();
        return view('workorder.create',[
            'barang' => $barang,
            'diskon' => $diskon,
        ]);
    }
    
}
