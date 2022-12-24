<?php

namespace App\Http\Controllers\qurol;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ResponseController;
use App\Models\Technic;

class TechnicController extends Controller
{
    public function add(Request $request){
        $validation = Validator::make($request->all(), [
            'name'=>'required',
            'measure'=>'required',            
            'militaries'=>'required',
        ]);
        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        }
        $total=0;
        foreach($request->militaries as $value){
            $total+=$value;
        }
        $militaries=json_encode($request->militaries);
        Technic::create([
            'name'=>$request->name,
            'measure'=>$request->measure,
            'militaries'=>$militaries,
            'total'=>$total
        ]);
        return ResponseController::success();
    }
    public function update(Request $request,$id){
        $validation = Validator::make($request->all(), [
            'name'=>'required',
            'measure'=>'required',            
            'militaries'=>'required',
        ]);
        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        }
        $total=0;
        foreach($request->militaries as $value){
            $total+=$value;
        }
        $militaries=json_encode($request->militaries);
        Technic::where('id',$id)->update([
            'name'=>$request->name,
            'measure'=>$request->measure,
            'militaries'=>$militaries,
            'total'=>$total
        ]);
        return ResponseController::success();
    }
    public function view(){
        $all=Technic::all();
        return ResponseController::data($all);
    }
}
