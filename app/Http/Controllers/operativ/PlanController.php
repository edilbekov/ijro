<?php

namespace App\Http\Controllers\operativ;

use Carbon\Carbon;
use App\Models\Day;
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
        
        // $plans=Plan::select('plans')->where('date',$request->date)->first(); 
        
        // if(isset($plans)){                        
        //     $plans=json_decode($plans,1); 
        //     return $plans;
        //     $plans[]=$request->plan;
        //     return $plans;
        //     Plan::where('date',$request->date)->update([
        //         'plans'=>$plans,
        //         'date'=>$request->date
        //     ]);
        // }
        // else{                        
            Plan::create([
                'plans'=>json_encode($request->plan),
                'date'=>$request->date
            ]);
        // }        
        return ResponseController::success();
    }
    public function view(){
        $data = Plan::select('*')
            ->whereMonth('date', Carbon::now()->month)
            ->get();
        // $plan=[];        
        // foreach($data as $value){
        //     $carbon=Carbon::create($value->date);            
        //     $dayofweek=$carbon->dayOfWeek;
        //     $dayofweek=Day::select('day')->where('id',$dayofweek)->first();            
        //     $plan['plans']=$value->plans;
        //     $plan['date']=$value->date;
        //     $plan['day']=$dayofweek['day'];
        // }
        return ResponseController::data($data);
    }
    public function add_week(Request $request){
          
    }
    public function view_week(){                   
        $data=Plan::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        return ResponseController::data($data);
    }
}
