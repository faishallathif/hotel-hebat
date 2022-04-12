<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Fasilitas;
use App\Models\DetailKamar;


use Illuminate\Http\Request;
use App\Http\Responses\ResponseUtils;
use App\Http\Responses\ConstantString;
use Illuminate\Support\Facades\Validator;

class KamarController extends Controller
{
    //
    public function index(){
        $data = Kamar::withFasilitas();
        return ResponseUtils::getValResponse(true, $data);

    }
    public function show($id){
        return kamar::withFasilitas($id);
    }
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            "harga" => "required",
            "jumlah"=>"required",
            "fasilitas" => "required",
            "tipe_kamar" => "required",
        ], $messages = [
            'required' => ConstantString::$required,
        ]);
        if ($validator->fails()) {
            // return response()->json(json_decode($validator->errors(), true), 400);
            return ResponseUtils::simpleResponse(false, json_decode($validator->errors(), true));
        }
        $data = Kamar::create($request->all());
        Kamar::generateDetail($data);
        return ResponseUtils::defaultInsert(true, $data);
    }
    public function update(Request $request,$id){
        $data = Kamar::where("id",$id)->first();
        DetailKamar::where("kamar_id",$id)->delete();

        for($i=1;$i<=$request->jumlah;$i++){
            $noKamar=$i;
            if($i<10){
                $noKamar="00"+$i;
            }elseif($i>10){
                $noKamar="0"+$i;
            }
            DetailKamar::create(
                [
                    'kamar_id'=>$request->id,
                    'no_kamar' => $request->tipe_kamar."-".$noKamar,
                    "status"=>"open",
                ]
            );
        }
        $data->update($request->all());
        return ResponseUtils::defaultUpdate(true, $data);
    }
    public function destroy($id){
        $data = Kamar::find($id);

        if($data){
            $data->delete();
        }else{
            return ResponseUtils::defaultDelete(false, $data);
        }
        return ResponseUtils::defaultDelete(true, $data);

    }
}
