<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Barang;
use App\Tempo;
use DB;

class WorkOrderController extends Controller
{
    public function index()
    {
        return view('workorder.index');
    }

    public function create()
    {
        $barang = Barang::pluck('nama_barang','kode_barang')->toArray();
        $cart = Tempo::all();

        return view('workorder.create',[
            'barang' => $barang,
            'cart' => $cart,
        ]);
    }

    public function store(Request $request)
    {
        $store = Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'diskon' => $request->diskon,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_beli,
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

    public function storeCart(Request $request){
        $harga = Barang::where('kode_barang', $request->kode_barang)->select('harga_jual')->value('harga_jual');
        $diskon = Barang::where('kode_barang', $request->kode_barang)->select('diskon')->value('diskon');
        $total = $harga * $request->jumlah;

        $store = Tempo::create([
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'diskon' => $diskon,
            'harga' => $harga,
            'total_harga' => $total,
            'id_users' => $request->user,
        ]);

        if($store){
            return response()->json(['success']);
        }
    }

    public function viewCart()
    {
        $id = Auth::id();
        $data = Tempo::where('id_users', $id)->with('barangs')->get();

        return response()->json($data);
    }

    public function deleteCart($id)
    {
        $destroy = Tempo::where('id_tempo',$id)->delete();

        if($destroy){
            return response()->json(['success']);
        }
    }
}
