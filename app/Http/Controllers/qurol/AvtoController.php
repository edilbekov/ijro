<?php

namespace App\Http\Controllers\qurol;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ResponseController;
use App\Models\Avto;

class AvtoController extends Controller
{
    public function add(Request $request){
        $validation = Validator::make($request->all(), [        
            'militaries'=>'required',
            'ats'=>'required'
        ]);
        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        }
        $ats=json_encode($request->ats);
        Avto::create([            
            'militaries'=>$request->militaries,
            'ats'=>$ats
        ]);
        return ResponseController::success();
    }
    public function update(Request $request,$id){
        $validation = Validator::make($request->all(), [                      
            'militaries'=>'required',
            'ats'=>'required'
        ]);
        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        }
        
        $ats=json_encode($request->ats);
        Avto::where('id',$id)->update([            
            'militaries'=>$request->militaries,
            'ats'=>$ats
        ]);
        return ResponseController::success();
    }
    public function view(){
        $all=Avto::all();
        return ResponseController::data($all);
    }
}
