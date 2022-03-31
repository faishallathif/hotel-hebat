<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Kamar;
use App\Models\Fasilitas;
use App\Http\Responses\ResponseUtils;
use App\Http\Responses\ConstantString;
use Illuminate\Support\Facades\Validator;
use PDF;
class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Pesanan::get()->map(function($item) {
                // $kamar = Kamar::whereIn('id', json_decode($item->kamar_id))->get();
                $kamars = collect(json_decode($item->kamar_id, true))->map(function($value){
                    $fasilitas = Kamar::find($value);
                    $realFasilitas = collect( json_decode($fasilitas->fasilitas,true))->map(function($v){
                        return Fasilitas::find($v);
                    });
                    $realKamar = Kamar::find($value);
                    $realKamar->fasilitas = $realFasilitas;
                    return $realKamar;
                }) ;
                // $kamars = json_decode($item->kamar_id, true);
                return [
                    'id' => $item->id,
                    'kamar' => $kamars,
                    "harga"=>$item->harga,
                    "jumlah"=>$item->jumlah,
                    "tipe_kamar"=>$item->tipe_kamar
                ];
            });

            return ResponseUtils::getValResponse(true, $data);

        } catch(Exception $e) {
            return ResponseUtils::getValResponse(true, $e->getMessage());

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validator = Validator::make(request()->all(), [
            "harga" => "required",
            "kamar_id" => "required",
            "harga" => "required",
            "tanggal_masuk" => "required",
            "tanggal_keluar"=>"required",
            "tipe_kamar" => "required",
        ], $messages = [
            'required' => ConstantString::$required,
        ]);
        if ($validator->fails()) {
            // return response()->json(json_decode($validator->errors(), true), 400);
            return ResponseUtils::simpleResponse(false, json_decode($validator->errors(), true));
        }
        $data = Pesanan::create(request()->all());
        return ResponseUtils::defaultInsert(true, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        if(!$pesanan){
            return ResponseUtils::notFound();
        }
        return ResponseUtils::getValResponse(true, $pesanan);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePesananRequest  $request
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update( Pesanan $pesanan)
    {
        if(!$pesanan){
            return ResponseUtils::notFound();
        }
        $data = Kamar::where("id",$id)->first();
        $data->update($request->all());
        return ResponseUtils::defaultUpdate(true, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        if(!$pesanan){
            return ResponseUtils::notFound();
        }
        return ResponseUtils::defaultDelete(true,$pesanan);
    }

    public function cetak_pdf($id)
    {
    	$pesanan = Pesanan::find($id);
 
    	$pdf = PDF::loadview('pesanan_pdf',['pesanan'=>$Pesanan]);
    	return $pdf->download('laporan-pesanan-pdf');
    }
}
