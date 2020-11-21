<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\StokMasuk;
use App\Barang;
use DB;


class StokMasukController extends Controller
{
    public function index()
    {
        $item = StokMasuk::all();
        return view('stokmasuk.index')->with('data', $item);
    }
    public function create()
    {
        $item = Barang::all();
        return view('stokmasuk.create')->with('data', $item);
    }
    public function store(Request $request)
    {
        $kode   = $request->kode_barang;
        $barang = Barang::where('kode_barang', $kode)->select('nama_barang')->value('nama_barang');
        $store  = StokMasuk::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $barang,
            'jumlah' => $request->jumlah,
            'nama_user' => $request->nama_user,
        ]);
        
        $stok = Barang::where('kode_barang', $kode)->select('stok')->value('stok');
        $hasil = $request->jumlah + $stok;
        $tambah = Barang::where('kode_barang', $kode)->update([
        'stok' => $hasil,
        ]);

        if($store){
            return redirect('/stokmasuk')->with('message_store','Berhasil menambahkan Stok Masuk');
        }else{
            return back('/stokmasuk')->with('message_store','Gagal menambahkan Stok Masuk');
        }
    }

    public function edit($id_stokmasuk)
    {
        $item = DB::table('stok_masuk')
        ->where('stok_masuk.id_stokmasuk','=',$id_stokmasuk)
        ->get();
        return view('stokmasuk.edit')->with('data', $item);
    }

    public function update(Request $request, $id_stokmasuk)
    {
        $update = StokMasuk::where('id_stokmasuk', $id_stokmasuk)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'nama_user' => $request->nama_user,
        ]);
        if($update){
            return redirect('/stokmasuk')->with('message_store','Berhasil update ');
        }else{
            return back('/stokmasuk')->with('message_store','Gagal update ');
        }
    }


}