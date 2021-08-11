<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\IsAdmin;
use App\DataPenalty;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function show_data(){
        if(\Session::has('admin')){
            \Session::forget("mitra");
            $data['data'] = DataPenalty::orderBy("id_tiket", "DESC")->paginate(10);
            return view("pages.data")->with($data);
        } else {
            return redirect(url('login'));
        }
        
    }

    public function show_mitra(Request $req){
        if(\Session::has('admin')){
            \Session::put('mitra', $req->input("mitra"));
            $mitra = \Session::get("mitra");
            $data['data'] = DataPenalty::where('mitra', $mitra)->orderBy("id_tiket", "DESC")->paginate(10);
            return view("pages.data")->with($data);
        } else {
            return redirect(url('login'));
        }
        
    }
    
    public function delete_all(){
        $data = DataPenalty::truncate();
        
        return redirect(url("/"));
    }

}