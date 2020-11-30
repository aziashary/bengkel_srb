<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Barang;
use App\Tempo;
use App\Costumer;
use App\WorkOrder;
use App\SubWorkOrder;
use DB;

class WorkOrderController extends Controller
{
    public function index()
    {
        $item = DB::table('workorder')
        ->select('workorder.id_workorder', 'workorder.no_workorder', 'workorder.model', 'workorder.delivery_date', 'workorder.estimasi_selesai','costumer.nama_costumer')
        ->join('costumer', 'costumer.no_workorder', '=', 'workorder.no_workorder')
        ->groupBy('workorder.id_workorder', 'workorder.no_workorder', 'workorder.model', 'workorder.delivery_date', 'workorder.estimasi_selesai','costumer.nama_costumer')
        ->get();

        return view('workorder.index')->with('data', $item);
    }

    public function create()
    {
        $trx= Auth::user()->id;
        $barang = Barang::pluck('nama_barang','kode_barang')->toArray();
        $cart = Tempo::all();
        $destroy = Tempo::where('id_users', $trx)->delete();

        return view('workorder.create',[
            'barang' => $barang,
            'cart' => $cart,
        ]);
    }

    public function store(Request $request)
    {
        $trx= Auth::user()->id;
        $nama= Auth::user()->name;
        $costumer = Costumer::create([
            'no_workorder' => $trx,
            'nama_costumer' => $request->nama_customer,
            'alamat' => $request->alamat,
            'npwp'=> $request->npwp,
        ]);
        $id_customer = Costumer::where('no_workorder', $trx)->select('id_costumer')->value('id_costumer');
        $workorder = WorkOrder::create([
            'no_workorder' => $trx,
            'id_costumer' => $id_customer,
            'no_flat' => $request->flat_no, 
            'model' => $request->model, 
            'kilometer_awal' => $request->kilometer_awal,
            'delivery_date'  => $request->delivery_date,
            'milleage' => $request->milleage,
            'estimasi_selesai' => $request->estimasi_selesai, 
            'total_transaksi' => $trx,
            'nama_user'=>  $nama,
            'sales' => $request->sales,
        ]);
        $item = Tempo::where('id_users', $trx)->with('barangs')->get(); 
		foreach ($item as $barang) {
            $store = SubWorkOrder::create([
                'id_workorder' => $barang->kode_barang,
                'kode_barang' => $barang->kode_barang,
                'jumlah' => $barang->jumlah,
                'deskripsi' => $barang->deskripsi,
                'harga' => $barang->harga,
                'diskon' => $barang->diskon,
                'total' => $barang->kode_barang,
                'tanggal_transaksi'=> $request->delivery_date, 
                'no_workorder'=> $trx,
            ]);
        
            $destroy = Tempo::where('id_users', $trx)->delete();
        }

        if($store){
            return redirect('/workorder')->with('message_store','Berhasil menambahkan barang');
        }else{
            return back('/workorder')->with('message_store','Gagal menambahkan barang');
        }
    }

    public function storeCart(Request $request){
        $harga = Barang::where('kode_barang', $request->kode_barang)->select('harga_jual')->value('harga_jual');
        $diskon = Barang::where('kode_barang', $request->kode_barang)->select('diskon')->value('diskon');
        $total = $diskon !== 0 ? $harga * ($diskon/100) * $request->jumlah : $harga * $request->jumlah ;

        $store = Tempo::create([
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'diskon' => $diskon,
            'harga' => $harga,
            'total_harga' => $total,
            // 'id_users' => $request->user,
            'id_users' => Auth::user()->id,
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
