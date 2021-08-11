<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Users;
use App\IsAdmin;
use App\DataPenalty;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function showData(Request $req){
        $users = Users::where("mitra", $req->input("mitra"))->first();

        if(!empty($users)){
            $data = DataPenalty::where("mitra", $users->mitra)->where("status_recon_v2", "NOT YET RECON_CLOSE")->get();
            return response()->json($data);
        } else {
            $data = DataPenalty::all();
            return response()->json($data);
        }

        

       
    }
    
    public function showForm(Request $req){
        $data = DataPenalty::where("id", $req->id)->first();
        
        if(!empty($data)){
            return response()->json([$data]);
        } else {
            return response()->json();
        }
    }

}