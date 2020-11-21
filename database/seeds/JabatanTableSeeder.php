<?php

use Illuminate\Database\Seeder;
use App\Jabatan;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'name'=>'Kepala Bengkel',
        ]);

        Jabatan::create([
            'name'=>'Sparepart',
        ]);
        Jabatan::create([
            'name'=>'Management',
        ]);

        Jabatan::create([
            'name'=>'Kasir',
        ]);
    }
}
