<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Users;
use App\IsAdmin;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    public function login(Request $request){
                        $users = Users::where('email',$request->input('email'))->first();
                        
                        if(!empty($users)){
                                if(\Hash::check($request->password, $users->password)){
                                    if(empty($users->mitra)){
                                        return response()->json(['status'=>true,'value'=>1,'message'=>'Anda Berhasil Login!', 
                                        'id'=>(string)$users->id,
                                        'username'=>$users->username,
                                        'email'=>$users->email,
                                        'mitra'=>"All"
                                        ]);
                                    } else {
                                        return response()->json(['status'=>true,'value'=>1,'message'=>'Anda Berhasil Login!', 
                                        'id'=>(string)$users->id,
                                        'username'=>$users->username,
                                        'email'=>$users->email,
                                        'mitra'=>$users->mitra
                                        ]);
                                    }
                                    
                                } else {
                                    return response()->json(["status"=>true, "value"=>2, "message"=>"Email atau password salah"]);
                                }
                        } else {
                             return response()->json(["status"=>true, "value"=>2, "message"=>"Email tidak terdaftar"]);
                        }

                        
    }

}