<?php

namespace App\Http\Controllers\moddiy;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Models\Fuel;
use App\Models\OperativReserve;
use App\Models\TroopsReserve;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    public function add(Request $request){
        Fuel::create([
            'shgho'=>$request->shgho,
            'fuel_spend'=>$request->fuel_spend
        ]);
        return ResponseController::success();
    }
    public function view(){
        $all=Fuel::all();             
        $nextfirst=0;
        $nextsecond=0;
        $first=0;
        $second=0;        
        $excessfirst=0;
        $excesssecond=0;
        $limitfirst=0;
        $limitsecond=0;
        
        $array=[];        
        foreach($all as $value){                                                
            $nextfirst+=$value['fuel_spend']['2023_yoqilgi']['ab'];
            $nextsecond+=$value['fuel_spend']['2023_yoqilgi']['de'];       
            $first+=$value['fuel_spend']['2022_yoqilgi']['ab'];
            $second+=$value['fuel_spend']['2022_yoqilgi']['de'];
            $excessfirst+=$value['fuel_spend']['ortiqcha_sarf']['ab'];
            $excesssecond+=$value['fuel_spend']['ortiqcha_sarf']['de'];
            $limitfirst+=$value['fuel_spend']['tejalgan_limit']['ab'];
            $limitsecond+=$value['fuel_spend']['tejalgan_limit']['de'];         
        }
        $total=[$nextfirst,$nextsecond,$first,$second,$excessfirst,$excesssecond,$limitfirst,$limitsecond];
        $all[]=$total;
        return ResponseController::data($all);
    }
    public function add_operativ(Request $request){
        OperativReserve::create([
            'name'=>$request->name,
            'ymm'=>$request->ymm
        ]);
        return ResponseController::success();
    }
    public function view_operativ(){
        $all=OperativReserve::all();
        return ResponseController::data($all);
    }
    public function add_troops(Request $request){
        TroopsReserve::create([
            'name'=>$request->name,
            'ymm'=>$request->ymm
        ]);
        return ResponseController::success();
    }
    public function view_troops(){
        $all=TroopsReserve::all();
        return ResponseController::data($all);
    }
}
