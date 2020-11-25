<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
        return view('workorder.create',[
            'barang' => $barang,
        ]);
    }

    public function keranjang(Request $request)
    {

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
            return redirect('workorder/create');
        }else{
            return back('workorder/create');
        }
    }

    public function table()
    {
        $item = Tempo::all();
        return view('workorder.create')->with('data', $item);
    }

    public function diskon(Request $request)
    {
        $search = $request->cari;
        $diskon = Barang::all();
        $search = !empty($request->cari) ? ($request->cari) : ('');

        if($search){
           $diskon->where('barang.nama_barang', 'like', '%' .$search . '%');
        }

        $data = $diskon->get();
        $response = array();
        foreach($data as $disko){
           $response[] = array(
               "diskon" => $disko->diskon,
            );
        }
        return response()->json($response);
    }
    
}
