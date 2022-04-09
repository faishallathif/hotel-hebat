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
}
