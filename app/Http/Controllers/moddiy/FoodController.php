<?php

namespace App\Http\Controllers\moddiy;

use App\Models\Food;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Models\BudjetFood;
use App\Models\SchrFood;

class FoodController extends Controller
{
    public function add(Request $request){
        $mtt=$request->mtt;
        $qism_21131=$request->qism_21131;
        $qism_71181=$request->qism_71181;
        $qism_53008=$request->qism_53008;
        $qism_49093=$request->qism_49093;
        $total=0;
        $total1=$mtt['quantity'];
        $total2=$qism_21131['quantity'];
        $total3=$qism_71181['quantity'];
        $total4=$qism_53008['quantity'];
        $total5=$qism_49093['quantity'];
        $total=$total1+$total2+$total3+$total4+$total5;
        $mtt=json_encode($request->mtt);
        $qism_21131=json_encode($request->qism_21131);
        $qism_71181=json_encode($request->qism_71181);
        $qism_53008=json_encode($request->qism_53008);
        $qism_49093=json_encode($request->qism_49093);
        Food::create([
            'name'=>$request->name,
            'measure'=>$request->measure,
            'mtt'=>$mtt,
            'qism_21131'=>$qism_21131,
            'qism_71181'=>$qism_71181,
            'qism_53008'=>$qism_53008,
            'qism_49093'=>$qism_49093,
            'total'=>$total
        ]);
        return ResponseController::success();
    }
    public function view(){
        $all=Food::all();
        return ResponseController::data($all);
    }
    public function add_schr(Request $request){
        $months=$request->months;
        $residual=0;
        foreach($months as $value){
            $residual+=$value;
        }
        $residual=$request->fund-$residual;
        SchrFood::create([
            'militaries'=>$request->militaries,
            'fund'=>$request->fund,
            'months'=>json_encode($months),            
            'residual'=>$residual
        ]);
        return ResponseController::success();
    }
    public function view_schr(){
        $all=SchrFood::all();
        return ResponseController::data($all);
    }
    public function add_budjet(Request $request){
        $months=$request->months;
        $residual=0;
        foreach($months as $value){
            $residual+=$value;
        }
        $residual=$request->fund-$residual;
        BudjetFood::create([
            'militaries'=>$request->militaries,
            'fund'=>$request->fund,
            'months'=>json_encode($months),            
            'residual'=>$residual
        ]);
        return ResponseController::success();
    }
    public function view_budjet(){
        $all=BudjetFood::all();
        return ResponseController::data($all);
    }
}
