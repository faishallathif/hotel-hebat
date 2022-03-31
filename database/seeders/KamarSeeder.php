<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kamars')->insert([
            'id_kamar' => "A1",
            'harga' => 500000,
            'fasilitas' => "[10,11,12]",
            "tipe_kamar"=>"VVIP"
        ]);
        DB::table('kamars')->insert([
            'id_kamar' => "A2",
            'harga' => 800000,
            'fasilitas' => "[10,11,12]",
            "tipe_kamar"=>"VVIP"
        ]);
        DB::table('kamars')->insert([
            'id_kamar' => "A3",
            'harga' => 1000000,
            'fasilitas' => "[10,11,12]",
            "tipe_kamar"=>"VVIP"
        ]);
    }
}
