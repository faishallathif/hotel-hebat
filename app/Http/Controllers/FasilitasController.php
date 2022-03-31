<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Http\Responses\ResponseUtils;
use Illuminate\Support\Facades\Validator;
use App\Http\Responses\ConstantString;
class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Fasilitas::all();

        if(request()->status){
            $data = Fasilitas::where("status",request()->status)->get();
        }
        return ResponseUtils::getValResponse(true, $data);
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
     * @param  \App\Http\Requests\StorefasilitasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validator = Validator::make(request()->all(), [
            "nama_fasilitas" => "required",
            "status"=>"required"
        ], $messages = [
            'required' => ConstantString::$required,
        ]);
     
        if ($validator->fails()) {
            // return response()->json(json_decode($validator->errors(), true), 400);
            return ResponseUtils::simpleResponse(false, json_decode($validator->errors(), true));
        }
        if(request()->file('gambar_fasilitas')){
            $gambar =request()->file('gambar_fasilitas');

            if ($gambar != null) {
                $filename = time() . '.' . $gambar->getClientOriginalExtension();
                $gambar->move('images/fasilitas/', $filename);
                $path = asset('images') . '/fasilitas/' . $filename;
               request()->request->add(['gambar' => $path]);
            }
        }
      
        $data = Fasilitas::create(request()->all());
        return ResponseUtils::defaultInsert(true, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fasilitas  $fasilita
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilita)
    {
        if(!$fasilita){
            return ResponseUtils::notFound();
        }
        return ResponseUtils::getValResponse(true, $fasilita);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fasilitas  $fasilita
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefasilitasRequest  $request
     * @param  \App\Models\fasilitas  $fasilita
     * @return \Illuminate\Http\Response
     */
    public function update( Fasilitas $fasilita)
    {
        if(!$fasilita){
            return ResponseUtils::notFound();
        }
        $data = Kamar::where("id",$id)->first();
        $data->update($request->all());
        return ResponseUtils::defaultUpdate(true, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fasilitas  $fasilita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilita)
    {
        if(!$fasilita){
            return ResponseUtils::notFound();
        }
        $gambar = explode('/', $fasilita->gambar);
        $filename = end($gambar);
        try {
            unlink('images/fasilitas/' . $filename);
        } catch (Exception $e) {
        }
        return ResponseUtils::defaultDelete(true,$fasilita);
    }
}
