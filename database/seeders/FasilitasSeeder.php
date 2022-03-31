<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //umum
        DB::table('fasilitas')->insert([
            'nama_fasilitas' => "Lapang Basket",
            'gambar' => asset('images')."/lapang-basket.jpg",
            'status' => "umum",
        ]);

        DB::table('fasilitas')->insert([
            'nama_fasilitas' => "Kolam Renang",
            'gambar' =>  asset('images')."/kolam-renang.jpg",
            'status' => "umum",
        ]);
        
        DB::table('fasilitas')->insert([
            'nama_fasilitas' => "Timezone",
            'gambar' => asset('images')."/timezone.jpg",
            'status' => "umum",
        ]);

        // kamar
        DB::table('fasilitas')->insert([
            'nama_fasilitas' => "Wifi",
            'status' => "kamar",
        ]);

        DB::table('fasilitas')->insert([
            'nama_fasilitas' => "Ac",
            'status' => "kamar",
        ]);
        
        DB::table('fasilitas')->insert([
            'nama_fasilitas' => "netflix",
            'status' => "kamar",
        ]);
    }
}
