<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use App\Http\Responses\ResponseUtils;
use App\Http\Responses\ConstantString;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // find all
        $data = User::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if(!$user){
            return ResponseUtils::getValResponse(false, $user);
        }
        return ResponseUtils::defaultUpdate(true, $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::where("id",$id)->first();
        if(!$data){
            return ResponseUtils::notFound();
        }
        $data->update($request->all());
        return ResponseUtils::defaultUpdate(true, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $data = User::find($id);

        if($data){
            $data->delete();
        }else{
            return ResponseUtils::defaultDelete(false, $data);
        }
        return ResponseUtils::defaultDelete(true, $data);

    }
    // ini fungsi buat login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where("email", $request->email)->first();
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return ResponseUtils::simpleResponse(true, ConstantString::$LOGIN_INVALID);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user->update(["token" => $token]);
        return ResponseUtils::login(true, $user, $token);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }

    public function getAuthenticatedUser()
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return ResponseUtils::simpleResponse(true,"User tidak ditemukan");

            }
        } catch (TokenExpiredException $e) {
            return ResponseUtils::simpleResponse(true,"Sesi anda telah berakhir");

        } catch (TokenInvalidException $e) {
            return ResponseUtils::simpleResponse(true,"User tidak ditemukan");
        } catch (JWTException $e) {
            return ResponseUtils::simpleResponse(true,"User tidak ditemukan");
        }
        return response()->json(compact('user'));
    }
}
