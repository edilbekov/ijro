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
            'fuel_spend'=>json_encode($request->fuel_spend)
        ]);
        return ResponseController::success();
    }
    public function view(){
        $all=Fuel::select('fuel_spend')->get();             
        $nextfirst=0;
        $nextsecond=0;
        $first=0;
        $second=0;        
        $excessfirst=0;
        $excesssecond=0;
        $limitfirst=0;
        $limitsecond=0;                  
        foreach($all as $value){    
            $dc=json_decode($value['fuel_spend'],1);                                                    
            $nextfirst+=$dc['yoqilgi_2023']['ab'];            
            $nextsecond+=$dc['yoqilgi_2023']['de'];       
            $first+=$dc['yoqilgi_2022']['ab'];
            $second+=$dc['yoqilgi_2022']['de'];
            $excessfirst+=$dc['ortiqcha_sarf']['ab'];
            $excesssecond+=$dc['ortiqcha_sarf']['de'];
            $limitfirst+=$dc['tejalgan_limit']['ab'];
            $limitsecond+=$dc['tejalgan_limit']['de'];         
        }
        $total=[$nextfirst,$nextsecond,$first,$second,$excessfirst,$excesssecond,$limitfirst,$limitsecond];
        $all['total']=$total;
        return ResponseController::data($all);
    }
    public function add_operativ(Request $request){
        OperativReserve::create([
            'name'=>$request->name,
            'ymm'=>json_encode($request->ymm)
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
            'ymm'=>json_encode($request->ymm)
        ]);
        return ResponseController::success();
    }
    public function view_troops(){
        $all=TroopsReserve::all();
        return ResponseController::data($all);
    }
}
