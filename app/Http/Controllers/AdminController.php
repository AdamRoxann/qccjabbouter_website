<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\IsAdmin;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function signin(Request $request){
                    
                        
                        $users = Users::where('email',$request->input('email'))->first();
                        
                        if(!empty($users)){
                            $cek = IsAdmin::where('user_id', $users->id)->first();
                            if(empty($cek)){
                                \Session::flash('err','Forbidden');
                                return redirect(url('/login'));
                                
                            } else{
                                if(\Hash::check($request->password, $users->password)){
                                    \Session::put('admin', $users);
                        	    	return redirect(url('/dashboard'));
                                } else {
                                    \Session::flash('err', 'Email atau password salah');
                        	    			return redirect('/login');
                                }
                            }
                        } else {
                             \Session::flash('err','Email tidak terdaftar');
                             return redirect(url('/login'));
                        }

                        
    }

    public function import() 
    {
        Excel::import(new DataImport,request()->file('file'));
        \Session::flash("success", "Data berhasil di upload.");
        return back();
    }
}