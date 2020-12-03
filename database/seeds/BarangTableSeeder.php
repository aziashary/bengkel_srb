<?php

use Illuminate\Database\Seeder;
use App\Kategori;
use App\Barang;
use App\StokMasuk;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'nama_kategori'=>'Oli',
        ]);

        Kategori::create([
            'nama_kategori'=>'Aksesoris',
        ]);

        Barang::create([
            'kode_barang'=>'B0001',
            'nama_barang'=>'Oli Rem',
            'kategori_barang'=>'Oli',
            'harga_beli'=>30000,
            'harga_jual'=>50000,
            'diskon'=>10,
            'stok'=>20,
        ]);

        Barang::create([
            'kode_barang'=>'B0002',
            'nama_barang'=>'Oli Mesin',
            'kategori_barang'=>'Oli',
            'harga_beli'=>40000,
            'harga_jual'=>100000,
            'diskon'=>50,
            'stok'=>20,
        ]);

        StokMasuk::create([
            'kode_barang'=>'B0002',
            'nama_barang'=>'Oli Rem',
            'jumlah'=>20,
            'nama_user'=>'kabeng',
        ]);

        StokMasuk::create([
            'kode_barang'=>'B0002',
            'nama_barang'=>'Oli Mesin',
            'jumlah'=>20,
            'nama_user'=>'kabeng',
        ]);
        
    }
}
