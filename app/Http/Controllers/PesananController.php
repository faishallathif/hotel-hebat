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
        $data = Pesanan::all();
        // try {
        //     $data = Pesanan::get()->map(function($item) {
        //         // $kamar = Kamar::whereIn('id', json_decode($item->kamar_id))->get();
        //         $kamars = collect(json_decode($item->kamar_id, true))->map(function($value){
        //             $fasilitas = Kamar::find($value);
        //             $realFasilitas = collect( json_decode($fasilitas->fasilitas,true))->map(function($v){
        //                 return Fasilitas::find($v);
        //             });
        //             $realKamar = Kamar::find($value);
        //             $realKamar->fasilitas = $realFasilitas;
        //             return $realKamar;
        //         }) ;
        //         // $kamars = json_decode($item->kamar_id, true);
        //         return [
        //             'id' => $item->id,
        //             'kamar' => $kamars,
        //             "harga"=>$item->harga,
        //             "jumlah"=>$item->jumlah,
        //             "tipe_kamar"=>$item->tipe_kamar
        //         ];
        //     });

            return ResponseUtils::getValResponse(true, $data);

        // } catch(Exception $e) {
        //     return ResponseUtils::getValResponse(true, $e->getMessage());

        // }
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
            "kamar_id" => "required",
            "no_kamar" => "required",
            "user_id"=>"required",
            "tanggal_masuk" => "required",
            "tanggal_keluar"=>"required",
            "jumlah_pesanan"=>"required"
        ], $messages = [
            'required' => ConstantString::$required,
        ]);
        if ($validator->fails()) {
            return ResponseUtils::simpleResponse(false, json_decode($validator->errors(), true));
        }
        $kamar = Kamar::find(request()->kamar_id);
        if(!$kamar){
            return ResponseUtils::notFound();
        }
        $tgl1 = strtotime( request()->tanggal_masuk);
        $tgl2 = strtotime( request()->tanggal_keluar);
        $jarak = $tgl2 - $tgl1;
        $hari = ($jarak / 60 / 60 / 24)+1;
        request()->request->add([
            "jumlah_hari"=>$hari,//get jumlah hari dari selisih tgl1 - tgl2,
            "harga"=>$kamar->harga,
            "tipe_kamar"=>$kamar->tipe_kamar,
            "jumlah_harga"=>$kamar->harga*request()->jumlah_pesanan*$hari,
        ]); 
        // return request()->all();
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
        $pesanan->no_kamar = json_decode( $pesanan->no_kamar);
        return view('pesanan_pdf',[
            "data"=>$pesanan
        ]);
        // return ResponseUtils::getValResponse(true, $pesanan);
        
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
        $pesanan->no_kamar = json_decode( $pesanan->no_kamar);
        
        view()->share('data',$pesanan);
    	$pdf = PDF::loadview('pesanan_pdf');
    	return $pdf->download('pesanan-'.$pesanan->id.'.pdf');
    }
}
