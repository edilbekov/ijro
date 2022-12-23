<?php

namespace App\Http\Controllers\jt;

use App\Models\Competition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ResponseController;

class CompetitionController extends Controller
{
    public function add(Request $request){
        $role  = $request->user()->role;
        if($role != "admin"){
            return ResponseController::error('No permission', 403);
        }
        $validation = Validator::make($request->all(), [
            'name'=>'required',                        
            'category'=>'required',
            'winner'=>'required',
            'result'=>'required|max:1',
            'date'=>'required'
        ]);

        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        }        
        Competition::create([
            'name'=>$request->name,                        
            'category'=>$request->category,
            'winner'=>$request->winner,
            'result'=>$request->result,
            'date'=>$request->date
        ]);        
        return ResponseController::success();
    }
    public function update(Request $request,$id){
        $role  = $request->user()->role;
        if($role != "admin"){
            return ResponseController::error('No permission', 403);
        }
        $validation = Validator::make($request->all(), [
            'name'=>'required',                        
            'category'=>'required',
            'winner'=>'required',
            'result'=>'required|max:1',
            'date'=>'required'
        ]);

        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        }        
        Competition::where('id',$id)->update([
            'name'=>$request->name,                        
            'category'=>$request->category,
            'winner'=>$request->winner,
            'result'=>$request->result,
            'date'=>$request->date
        ]);        
        return ResponseController::success();
    }
    public function delete($id){
        $role  = Auth::user()->role;
        if($role != "admin"){
            return ResponseController::error('No permission', 403);
        } 
        Competition::where('id',$id)->delete();
        return ResponseController::success();
    }
    public function view(){
        $all=Competition::all();
        return ResponseController::data($all);
    }
}
