<?php

namespace App\Http\Controllers\tibbiy;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Models\Medical;
use App\Models\MedicalSecond;
use Illuminate\Http\Request;

class MedicalController extends Controller
{
    public function add(Request $request){
        Medical::create([
            'content'=>$request->content,
            'general'=>json_encode($request->general),            
        ]);
        return ResponseController::success();
    }
    public function update(Request $request,$id){
        Medical::where('id',$id)->update([
            'content'=>$request->content,
            'general'=>$request->general,            
        ]);
        return ResponseController::success();
    }
    public function view(){
        $all=Medical::all();
        return ResponseController::data($all);
    }
    public function add_primary(Request $request){
        MedicalSecond::create([
            'diseases'=>$request->diseases,
            'departments'=>json_encode($request->departments),            
        ]);
        return ResponseController::success();
    }
    public function update_primary(Request $request,$id){
        MedicalSecond::where('id',$id)->update([
            'diseases'=>$request->diseases,
            'departments'=>$request->departments,            
        ]);
        return ResponseController::success();
    }
    public function view_primary(){
        $all=MedicalSecond::all();
        return ResponseController::data($all);
    }
}
