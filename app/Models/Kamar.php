<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function withFasilitas($id=null){
        if($id){
            $kamar = Kamar::find($id);
            $realFasilitas = Fasilitas::whereIn('id', json_decode($kamar->fasilitas))->get();
            $kamar->fasilitas = $realFasilitas;
            return $kamar;
        }
        return Kamar::all()->map(function($kamar){
            $realFasilitas = Fasilitas::whereIn('id', json_decode($kamar->fasilitas))->get();
            $kamar->fasilitas = $realFasilitas;
            return $kamar;
        });
    }
    public function generateDetail($data){
        for($i=1;$i<=$data->jumlah;$i++){
            $noKamar=$i;
            if($i<10){
                $noKamar="00"+$i;
            }elseif($i>10){
                $noKamar="0"+$i;
            }
            DetailKamar::create(
                [
                    'kamar_id'=>$data->id,
                    'no_kamar' => $data->tipe_kamar."-".$noKamar,
                    "status"=>"open",
                ]
            );
        }
    }
}
