<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Kategori;
use DB;


class KategoriController extends Controller
{
    public function index()
    {
        $item = Kategori::all();
        return view('kategori.index')->with('data', $item);
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $store = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);
        if($store){
            return redirect('/kategori')->with('success','Berhasil menambahkan kategori');
        }else{
            return back()->with('error','Gagal menambahkan kategori');
        }
    }

    public function edit($id_kategori)
    {
        $item = Kategori::where('kategori.id_kategori','=',$id_kategori)->get();

        return view('kategori.edit')->with('data', $item);
    }

    public function update(Request $request, $id_kategori)
    {
        $update = Kategori::where('id_kategori', $id_kategori)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        if($update){
            return redirect('/kategori')->with('success','Berhasil update kategori');
        }else{
            return back()->with('error','Gagal update ');
        }
    }

    public function delete($id_kategori)
    {
        $destroy = Kategori::where('id_kategori',$id_kategori)->delete();

        return redirect('/kategori')->with('success','Berhasil menghapus kategori');
    }
}