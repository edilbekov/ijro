<?php

namespace App\Http\Controllers\moddiy;

use App\Models\Clothes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Models\ContractClothes;
use App\Models\SchrClothes;

class ClothesController extends Controller
{
    public function add(Request $request){
        $need=$request->need;
        $provided=$request->provided;
        $notenough=$need-$provided;
        $providedpercent=($provided/$need)*100;
        Clothes::create([
            'name'=>$request->name,
            'measure'=>$request->measure,
            'need'=>$need,
            'provided'=>$provided,
            'notenough'=>$notenough,
            'providedpercent'=>$providedpercent
        ]);
        return ResponseController::success();
    }
    public function view(){
        $all=Clothes::all();
        return ResponseController::data($all);
    }
    public function add_schr(Request $request){
        $need=$request->need;
        $provided=$request->provided;
        $providedpercent=($provided/$need)*100;
        SchrClothes::create([
            'name'=>$request->name,
            'measure'=>$request->measure,
            'need'=>$need,
            'provided'=>$provided,            
            'providedpercent'=>$providedpercent,
            'comment'=>$request->comment
        ]);
        return ResponseController::success();
    }
    public function view_schr(){
        $all=SchrClothes::all();
        return ResponseController::data($all);
    }
    public function add_contract(Request $request){
        ContractClothes::create([
            'harbiy_qismlar'=>$request->harbiy_qismlar,
            'quloqchin_telpak'=>$request->quloqchin_telpak,
            'qishki_kurtka'=>$request->qishki_kurtka,
            'yozgi_kostyum'=>$request->yozgi_kostyum,
            'ichki_kiyim'=>$request->ichki_kiyim,
            'botinka'=>$request->botinka
        ]);
        return ResponseController::success();
    }
    public function view_contract(){
        $all=ContractClothes::all();
        return ResponseController::data($all);
    }
}
