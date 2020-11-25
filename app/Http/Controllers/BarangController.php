<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;
use DB;


class BarangController extends Controller
{
    public function index()
    {
        $item = Barang::all();
        return view('barang.index')->with('data', $item);
    }
    public function create()
    {
        $item = Kategori::pluck('nama_kategori','nama_kategori')->toArray();
        return view('barang.create')->with('kategori', $item);
    }
    public function store(Request $request)
    {
        $store = Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'diskon' => $request->diskon,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'diskon' => $request->diskon,
            'stok' => $request->stok,
            'kategori_barang' => $request->kategori,
            
        ]);
        if($store){
            return redirect('/barang')->with('message_store','Berhasil menambahkan barang');
        }else{
            return back('/barang')->with('message_store','Gagal menambahkan barang');
        }
    }

    public function edit($kode_barang)
    {
        $item = DB::table('barang')
        ->where('barang.kode_barang','=',$kode_barang)
        ->get();
        return view('barang.edit')->with('data', $item);
    }

    public function update(Request $request, $kode_barang)
    {
        $update = Barang::where('kode_barang', $kode_barang)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_beli,
            'diskon' => $request->diskon,
            'stok' => $request->stok,
            'kategori_barang' => $request->kategori,
        ]);
        if($update){
            return redirect('/barang')->with('message_store','Berhasil update ');
        }else{
            return back('/barang')->with('message_store','Gagal update ');
        }
    }

    public function delete($kode_barang)
    {
        $destroy = Barang::where('kode_barang',$kode_barang)->delete();
        return redirect('/barang');
    }

}