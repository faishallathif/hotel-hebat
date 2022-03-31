<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Fasilitas;

use Illuminate\Http\Request;
use App\Http\Responses\ResponseUtils;
use App\Http\Responses\ConstantString;
use Illuminate\Support\Facades\Validator;

class KamarController extends Controller
{
    //
    public function index(){
        try {
            $data = Kamar::get()->map(function($item) {
                $fasilitas = Fasilitas::whereIn('id', json_decode($item->fasilitas))->get();
                return [
                    'id' => $item->id,
                    'id_kamar' => $item->id_kamar,
                    "harga"=>$item->harga,
                    "fasilitas"=>$fasilitas,
                    "tipe_kamar"=>$item->tipe_kamar
                ];
            });

            return response()->json([
                'status' => true,
                'data' => $data
            ]);
        } catch(Exception $e) {
            return response()->json([
                'status' => false,
                'data' => $e->getMessage()
            ]);
        }
        return ResponseUtils::getValResponse(true, $data);

    }

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            "harga" => "required",
            "id_kamar" => "required",
            "harga" => "required",
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
        return ResponseUtils::defaultInsert(true, $data);
    }

    public function update(Request $request,$id){
        $data = Kamar::where("id",$id)->first();
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
