<?php

namespace App\Http\Controllers\jt;

use App\Models\jt\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ResponseController;
use App\Models\Day;

class ScheduleController extends Controller
{
    public function add(Request $request){
        $role  = $request->user()->role;
        if($role != "admin"){
            return ResponseController::error('No permission', 403);
        }                   
        $validation = Validator::make($request->all(), [
            'group'=>'required',
            'day_id'=>'required',
            'subjects'=>'required'
        ]);

        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        }
        $day_id=$request->day_id;    
        $subjects=json_encode($request->subjects);                                   
        Schedule::create([
            'group'=>$request->group,
            'day_id'=>$day_id,
            'subjects'=>$subjects
        ]);
        return ResponseController::success();
    }
    public function update(Request $request,$id){
        $role  = $request->user()->role;
        if($role != "admin"){
            return ResponseController::error('No permission', 403);
        }                   
        $validation = Validator::make($request->all(), [
            'group'=>'required',
            'day_id'=>'required',
            'subjects'=>'required'
        ]);

        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        }
        $day_id=$request->day_id;
        // $day=Day::select('day')->where('id',$day_id)->first();
        $subjects=json_encode($request->subjects);         
        Schedule::where('id',$id)->update([
            'group'=>$request->group,
            'day_id'=>$day_id,
            'subjects'=>$subjects
        ]);
        return ResponseController::success();
    }
    public function delete($id){
        $role  = Auth::user()->role;
        if($role != "admin"){
            return ResponseController::error('No permission', 403);
        }     
        Schedule::where('id',$id)->delete();
        return ResponseController::success();
    }
    public function view(){
        $all=Schedule::all();
        return ResponseController::data($all);
    }
}
