<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'nama_lengkap'  =>'Customer',
            'no_hp'         =>81572,
            'alamat_lengkap'=>'Jl. Panembakan No 234' ,
            'email'         =>'customer@gmail.com',
            'password'      =>Hash::make('cus123'),
        ]);
    }
}
