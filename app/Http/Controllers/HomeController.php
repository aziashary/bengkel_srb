<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Barang;
use App\Tempo;
use App\WorkOrder;
use App\Customer;
use App\Invoice;
use App\StokMasuk;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stok_habis = Barang::where('stok', '<=', 2 )->skip(0)->take(10)->get();
        $stok_masuk = StokMasuk::orderBy('created_at', 'desc')->skip(0)->take(10)->get();
        // $stok_keluar = Barang::all->skip(0)->take(10)->get();
        $workorder = WorkOrder::orderBy('created_at', 'desc')->with('customers')->skip(0)->take(10)->get();
        $invoice = Invoice::orderBy('created_at', 'desc')->with('customers')->skip(0)->take(10)->get();
        return view('dashboard',[
        'stok_habis' => $stok_habis,
        'stok_masuk' => $stok_masuk,
        'workorder' => $workorder,
        'invoice' => $invoice,
        ]);
    }
}
