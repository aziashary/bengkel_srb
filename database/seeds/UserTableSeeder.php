<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Kepala Bengkel',
            'jabatan'=>1,
            'username'=>'kabeng',
            'email'=>'kabeng@gmail.com',
            'password'=>Hash::make('12345678'),
        ]);

        User::create([
            'name'=>'Sparepart',
            'jabatan'=>2,
            'username'=>'sparepart',
            'email'=>'sparepart@gmail.com',
            'password'=>Hash::make('12345678'),
        ]);
        User::create([
            'name'=>'Management',
            'jabatan'=>3,
            'username'=>'management',
            'email'=>'management@gmail.com',
            'password'=>Hash::make('12345678'),
        ]);

        User::create([
            'name'=>'Kasir',
            'jabatan'=>4,
            'username'=>'kasir',
            'email'=>'kasir@gmail.com',
            'password'=>Hash::make('12345678'),
        ]);

    }
}
