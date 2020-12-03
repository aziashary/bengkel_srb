<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Barang;
use App\Tempo;
use App\Customer;
use App\WorkOrder;
use App\SubWorkOrder;
use DB;

class WorkOrderController extends Controller
{
    public function index()
    {
        $item = DB::table('workorder')
        ->select('workorder.id_workorder', 'workorder.no_workorder', 'workorder.model', 'workorder.delivery_date', 'workorder.estimasi_selesai','customer.nama_customer')
        ->join('customer', 'customer.no_workorder', '=', 'workorder.no_workorder')
        ->groupBy('workorder.id_workorder', 'workorder.no_workorder', 'workorder.model', 'workorder.delivery_date', 'workorder.estimasi_selesai','customer.nama_customer')
        ->get();

        return view('workorder.index')->with('data', $item);
    }

    public function create()
    {
        $barang = Barang::all();
        $cart = Tempo::all();
        // $destroy = Tempo::where('id_users', $trx)->delete();

        return view('workorder.create',[
            'barang' => $barang,
            'cart' => $cart,
        ]);
    }

    public function detail($id_workorder)
    {
        
        $id_user = WorkOrder::where('id_workorder', $id_workorder)->select('id_user')->value('id_user');
        $subwo = SubWorkOrder::where('subworkorder.id_workorder', $id_workorder)->get();
        $destroy = Tempo::where('id_users', $id_user)->delete();
        foreach ($subwo as $tempo) {
        $store = Tempo::create([
            'kode_barang' => $tempo->kode_barang,
            'jumlah' => $tempo->jumlah,
            'deskripsi' => $tempo->deskripsi,
            'diskon' => $tempo->diskon,
            'harga' => $tempo->harga,
            'total_harga' => $tempo->total,
            'id_users' => $id_user,
            ]);
        }
        
        
        $data = WorkOrder::where('workorder.id_workorder', $id_workorder)->get();
        $wo = WorkOrder::where('workorder.id_workorder', $id_workorder)->select('no_workorder')->
        value('no_workorder');
        $work = Customer::where('customer.no_workorder', $wo)->get();
        $barang = Barang::pluck('nama_barang','kode_barang')->toArray();
        return view('workorder.detail',[
            'item' => $data,
            'barang' => $barang,
            'no_wo' => $work,

        ]);
      
        
    }

    public function store(Request $request)
    {
        $id_user = Auth::user()->id;
        $nama_user = Auth::user()->name;
        $dateNow = date('d');
        $yearNow = date('Y');
        $id_workorder = WorkOrder::latest('id_workorder')->select('id_workorder')->value('id_workorder');
        $no_workorder = "/WO/".$dateNow."/SRB/".$id_user."/".$yearNow."/".($id_workorder+1);
        // dd($no_workorder);
        $customer = Customer::create([
            'no_workorder' => $no_workorder,
            'nama_customer' => $request->nama_customer,
            'alamat' => $request->alamat,
            'npwp'=> $request->npwp,
        ]);
        $id_customer = Customer::where('no_workorder', $no_workorder)->select('id_customer')->value('id_customer');
        $workorder = WorkOrder::create([
            'no_workorder' => $no_workorder,
            'id_customer' => $id_customer,
            'no_flat' => $request->flat_no, 
            'model' => $request->model, 
            'kilometer_awal' => $request->kilometer_awal,
            'delivery_date'  => $request->delivery_date,
            'milleage' => $request->milleage,
            'estimasi_selesai' => $request->estimasi_selesai, 
            'total_transaksi' => $request->total,
            'id_user'=> $id_user,
            'sales' => $request->sales,
            'status' => 0,
        ]);

        $item = Tempo::where('id_users', $id_user)->with('barangs')->get();
        $id_wo = WorkOrder::where('no_workorder', $no_workorder)->select('id_workorder')->value('id_workorder');
		foreach ($item as $barang) {
            $store = SubWorkOrder::create([
                'id_workorder' => $id_wo,
                'kode_barang' => $barang->kode_barang,
                'jumlah' => $barang->jumlah,
                'deskripsi' => $barang->deskripsi,
                'harga' => $barang->harga,
                'diskon' => $barang->diskon,
                'total' => $barang->total_harga,
                'tanggal_transaksi'=> $request->delivery_date, 
                'no_workorder'=> $no_workorder,
            ]);
        
            $destroy = Tempo::where('id_users', $id_user)->delete();
        }

        if($store){
            return redirect('/workorder')->with('success','Berhasil menambahkan work order');
        }else{
            return back()->with('error','Gagal menambahkan work order');
        }
    }

    public function storeCart(Request $request){
        $harga = Barang::where('kode_barang', $request->kode_barang)->select('harga_jual')->value('harga_jual');
        $diskon = Barang::where('kode_barang', $request->kode_barang)->select('diskon')->value('diskon');
        $total = $diskon !== 0 ? $harga - ($harga * ($diskon/100)) * $request->jumlah : $harga * $request->jumlah ;

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

    public function viewBarang($kode_barang)
    {
        $data = Barang::where('kode_barang', $kode_barang)->get();

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
