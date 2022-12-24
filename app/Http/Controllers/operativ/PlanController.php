<?php

namespace App\Http\Controllers\operativ;

use Carbon\Carbon;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ResponseController;

class PlanController extends Controller
{
    public function add(Request $request){        
        $validation = Validator::make($request->all(), [
            'plan'=>'required',
            'date'=>'required',            
        ]);
        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        }
        
        $plans=Plan::select('plans')->where('date',$request->date)->get();  
        $plans[]=$request->plan;      
        if(!count($plans)==0){            
            Plan::where('date',$request->date)->update([
                'plans'=>$plans,
                'date'=>$request->date
            ]);
        }
        else{            
            Plan::create([
                'plans'=>$request->plan,
                'date'=>$request->date
            ]);
        }        
        return ResponseController::success();
    }
    public function view(){
        $data = Plan::select('*')
            ->whereMonth('date', Carbon::now()->month)
            ->get();
        $plan=[];
        foreach($data as $value){
            $carbon=Carbon::create($value->date);
            $dayofweek=$carbon->dayOfWeek;
            $plan['plans'][]=$value->plans;
            $plan['date'][]=$value->date;
            $plan['days'][]=$dayofweek;
        }
        return ResponseController::data($plan);
    }
    public function add_week(Request $request){
          
    }
    public function view_week(){
        $data = Plan::select('*')
        ->whereWeek('date', Carbon::now()->week)
        ->get();
        // $data=Plan::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        return ResponseController::data($data);
    }
}
