<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailKamar;
use App\Models\Kamar;
use App\Http\Responses\ResponseUtils;
use Illuminate\Support\Facades\Validator;
use App\Http\Responses\ConstantString;
class DetailKamarController extends Controller
{
    //
    public function index(){
        $data= DetailKamar::all();
        return ResponseUtils::getValResponse(true, $data);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            "kamar_id" => "required",
        ], $messages = [
            'required' => ConstantString::$required,
        ]);
     
        if ($validator->fails()) {
            // return response()->json(json_decode($validator->errors(), true), 400);
            return ResponseUtils::simpleResponse(false, json_decode($validator->errors(), true));
        }
        $kamar_id=request()->kamar_id;
        $kamar = Kamar::find($kamar_id);
        if(!$kamar){
            return ResponseUtils::notFound();
        }
        $jumlahKamar = DetailKamar::where(["kamar_id"=>$kamar_id])->count()+1;
        $noKamar = $kamar->tipe_kamar."-".$jumlahKamar;
        $detailKamar = DetailKamar::create([
            "kamar_id"=>$kamar_id,
            "no_kamar"=>$noKamar,
            "status"=>"open"
        ]);
        return ResponseUtils::defaultInsert(true, $detailKamar);
    }

    public function destroy(DetailKamar $detail_kamar)
    {

        if($detail_kamar){
            $detail_kamar->delete();
        }else{
            return ResponseUtils::defaultDelete(false, $detail_kamar);
        }
        return ResponseUtils::defaultDelete(true, $detail_kamar);

    }
}
