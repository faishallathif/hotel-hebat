<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->foreignId("kamar_id");
            $table->json("no_kamar");
            $table->integer("jumlah_pesanan");
            $table->string("tipe_kamar");
            $table->double("jumlah_harga");
            $table->double("harga");
            $table->integer("jumlah_hari");
            $table->date("tanggal_masuk");
            $table->date("tanggal_keluar");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
