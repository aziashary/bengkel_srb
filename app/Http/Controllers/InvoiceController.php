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
use App\StokKeluar;
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
        
        $data = WorkOrder::where('workorder.id_workorder', $id_workorder)->with('customers')->get();
        $wo = WorkOrder::where('workorder.id_workorder', $id_workorder)->select('no_workorder')->value('no_workorder');
        $work = Customer::where('customer.no_workorder', $wo)->get();
        $barang = Barang::all();
        return view('invoice.create',[
            'item' => $data,
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

    public function detail($id_invoice)
    {
        $id_user = Invoice::where('id_invoice', $id_invoice)->select('id_user')->value('id_user');
        $subwo = SubInvoice::where('subinvoice.id_invoice', $id_invoice)->get();
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
        
        $item = Invoice::where('invoice.id_invoice', $id_invoice)->with('customers')->get();
        $barang = Barang::pluck('nama_barang','kode_barang')->toArray();
        return view('invoice.detail',[
            'item' => $item,
            'barang' => $barang,

        ]);
      
        
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
            'finish_date' => $request->finish_date, 
            'total_transaksi' => $request->total,
            'id_user'=> $request->id_user,
            'sales' => $request->sales,
            'status' => 1,
        ]);
        
        $id_invo = Invoice::where('no_invoice', $no_invoice)->select('id_invoice')->value('id_invoice');
        $item = Tempo::where('id_users', $request->id_user)->with('barangs')->get();
        $id_subwo = SubWorkOrder::where('no_workorder', $request->no_workorder)->select('id_subworkorder')->value('id_subworkorder');
		foreach ($item as $barang) {
            $store = SubInvoice::create([
                'id_workorder' => $request->id_workorder,
                'id_subworkorder' => $id_subwo,
                'id_invoice' => $id_invo,
                'kode_barang' => $barang->kode_barang,
                'jumlah' => $barang->jumlah,
                'deskripsi' => $barang->deskripsi,
                'harga' => $barang->harga,
                'diskon' => $barang->diskon,
                'total' => $barang->total_harga,
                'tanggal_transaksi'=> $request->delivery_date, 
                'no_invoice'=> $no_invoice,
            ]);
            $nama_barang = Barang::where('kode_barang', $barang->kode_barang)->select('nama_barang')->value('nama_barang');
            $stok_keluar = StokKeluar::create([
                'kode_barang' => $barang->kode_barang,
                'nama_barang' => $nama_barang,
                'jumlah' => $barang->jumlah,
                'nama_user' => $nama_user,
                'no_invoice' => $no_invoice,
            ]); 
           
        }
        $destroy = Tempo::where('id_users', $request->id_user)->delete(); 

        if($store){
            return redirect('/invoice')->with('success','Berhasil menambahkan Invoice');
        }else{
            return back()->with('error','Gagal menambahkan Invoice');
        }
    }

    public function storeCart(Request $request){
        $harga = Barang::where('kode_barang', $request->kode_barang)->select('harga_jual')->value('harga_jual');
        $stok = $request->stok;
        $diskon = $request->diskon;
        $jumlah = $request->jumlah;
        $harga_diskon = $harga - ($diskon/100 * $harga);
        $total = $diskon != 0 ? $harga_diskon * $jumlah : $harga * $jumlah ;
        $find = Tempo::where('kode_barang', $request->kode_barang)->first();
        if($find === null){
            $store = Tempo::create([
                'kode_barang' => $request->kode_barang,
                'jumlah' => $jumlah,
                'deskripsi' => $request->deskripsi,
                'diskon' => $diskon,
                'harga' => $harga,
                'total_harga' => $total,
                'id_users' => Auth::user()->id,
            ]);
        }else{
            $store = Tempo::where('kode_barang', $request->kode_barang)->update([
                'jumlah' => $find->jumlah + $jumlah,
                'deskripsi' => $request->deskripsi,
                'total_harga' => $find->total_harga + $total,
            ]);
        }
        
        $stok = $stok - $jumlah;
        $updateStok = Barang::where('kode_barang', $request->kode_barang)->update([
            'stok' => $stok
        ]);

        if($store && $updateStok){
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
        $findTempo = Tempo::where('id_tempo',$id)->first();
        $kode_barang = $findTempo->kode_barang;
        $jumlah = $findTempo->jumlah;

        $findBarang = Barang::where('kode_barang',$kode_barang)->first();
        $stokBarang = $findBarang->stok;

        $stokBaru = $stokBarang + $jumlah;
        $updateStok = Barang::where('kode_barang', $kode_barang)->update([
            'stok' => $stokBaru
        ]);

        $destroy = Tempo::where('id_tempo',$id)->delete();

        if($destroy){
            return response()->json(['success']);
        }
    }
}
