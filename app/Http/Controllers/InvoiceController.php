<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Barang;
use App\Tempo;
use App\WorkOrder;
use App\SubWorkOrder;
use App\Customer;
use App\Invoice;
use App\SubInvoice;
use DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $item = DB::table('invoice')
        ->select('invoice.id_invoice', 'invoice.no_invoice', 'invoice.model', 'invoice.delivery_date', 'invoice.estimasi_selesai', 'invoice.no_workorder', 'customer.nama_customer')
        ->join('customer', 'customer.no_invoice', '=', 'invoice.no_invoice')
        ->groupBy('invoice.id_invoice', 'invoice.no_invoice', 'invoice.model', 'invoice.delivery_date', 'invoice.estimasi_selesai', 'invoice.no_workorder', 'customer.nama_customer')
        ->get();

        return view('invoice.index')->with('data', $item);
    }

    public function select()
    {
        $item = DB::table('workorder')
        ->select('workorder.id_workorder', 'workorder.no_workorder', 'workorder.model', 'workorder.delivery_date', 'workorder.estimasi_selesai','customer.nama_customer')
        ->join('customer', 'customer.no_workorder', '=', 'workorder.no_workorder')
        ->where('status', '=', 0)
        ->groupBy('workorder.id_workorder', 'workorder.no_workorder', 'workorder.model', 'workorder.delivery_date', 'workorder.estimasi_selesai','customer.nama_customer')
        ->get();

        return view('invoice.select')->with('data', $item);
    }

    public function create($id_workorder)
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
        return view('invoice.create',[
            'item' => $data,
            'barang' => $barang,
            'no_wo' => $work,

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

    public function store(Request $request)
    {
        $id_user = Auth::user()->id;
        $nama_user = Auth::user()->name;
        $dateNow = date('d');
        $yearNow = date('Y');
        $id_invoice = Invoice::latest('id_invoice')->select('id_invoice')->value('id_invoice');
        $no_invoice = "/INV/".$dateNow."/SRB/".$id_user."/".$yearNow."/".($id_invoice+1);
        // dd($no_workorder);
        
        $customer = Customer::where('no_workorder', $request->no_workorder)->update([
            'no_invoice' => $no_invoice,
            'nama_customer' => $request->nama_customer,
            'alamat' => $request->alamat,
            'npwp'=> $request->npwp,
        ]);
        
        $gantistatus = WorkOrder::where('id_workorder', $request->id_workorder)->update([
            'status' => 1,
        ]);

        $id_customer = Customer::where('no_workorder', $request->no_workorder)->select('id_customer')->value('id_customer');
        $invoice = Invoice::create([
            'no_workorder' => $request->no_workorder,
            'id_workorder' => $request->id_workorder,
            'no_invoice' => $no_invoice,
            'id_customer' => $request->id_customer,
            'no_flat' => $request->flat_no, 
            'model' => $request->model, 
            'kilometer_awal' => $request->kilometer_awal,
            'delivery_date'  => $request->delivery_date,
            'milleage' => $request->milleage,
            'estimasi_selesai' => $request->estimasi_selesai, 
            'total_transaksi' => $request->total,
            'id_user'=> $request->id_user,
            'sales' => $request->sales,
            'status' => 1,
        ]);
        
        $item = Tempo::where('id_users', $request->id_user)->with('barangs')->get();
        $id_subwo = SubWorkOrder::where('no_workorder', $request->no_workorder)->select('id_subworkorder')->value('id_subworkorder');
		foreach ($item as $barang) {
            $store = SubInvoice::create([
                'id_workorder' => $request->id_workorder,
                'id_subworkorder' => $id_subwo,
                'id_invoice' => $id_invoice,
                'kode_barang' => $barang->kode_barang,
                'jumlah' => $barang->jumlah,
                'deskripsi' => $barang->deskripsi,
                'harga' => $barang->harga,
                'diskon' => $barang->diskon,
                'total' => $barang->total_harga,
                'tanggal_transaksi'=> $request->delivery_date, 
                'no_invoice'=> $no_invoice,
            ]);
        
            $destroy = Tempo::where('id_users', $request->id_user)->delete();
        }

        if($store){
            return redirect('/invoice')->with('success','Berhasil menambahkan work order');
        }else{
            return back()->with('error','Gagal menambahkan work order');
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
