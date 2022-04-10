<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kamar;
use App\Models\User;


class Pesanan extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $with = ["user","kamar"];
    protected $hidden = ["user_id","kamar_id"];

    public function user(){
        return $this->belongsTo(User::class);
    }
    function getKamar($pesanan){
        $kamars = collect(json_decode($pesanan->kamar_id, true))->map(function($value){
            $fasilitas = Kamar::find($value);
            $realFasilitas = collect( json_decode($fasilitas->fasilitas,true))->map(function($v){
                return Fasilitas::find($v);
            });
            $realKamar = Kamar::find($value);
            $realKamar->fasilitas = $realFasilitas;
            return $realKamar;
        }) ;
        $pesanan->kamar_id = $kamars;
        return $pesanan;
    }
    function kamar(){
        return $this->belongsTo(Kamar::class);
    }
}
