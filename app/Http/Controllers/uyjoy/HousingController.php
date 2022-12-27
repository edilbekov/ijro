<?php

namespace App\Http\Controllers\uyjoy;

use App\Models\Housing1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Models\Construction;
use App\Models\HousingOficer;

class HousingController extends Controller
{
    public function add(Request $request){
        Housing1::create([
            'military_rank'=>$request->military_rank,
            'fio'=>$request->fio,
            'house'=>$request->house,
            'comment'=>$request->comment,            
        ]);
        return ResponseController::success();
    }
    public function view(){
        $all=Housing1::all();
        return ResponseController::data($all);
    }
    public function add_oficer(Request $request){
        HousingOficer::create([
            'military_rank'=>$request->military_rank,
            'fio'=>$request->fio,
            'institution'=>$request->institution,
            'room'=>$request->room,
            'married'=>$request->married,
            'children'=>$request->children,            
        ]);
        return ResponseController::success();
    }
    public function view_oficer(){
        $all=HousingOficer::all();
        return ResponseController::data($all);
    }
    public function add_construction(Request $request){
        Construction::create([
            'object'=>$request->object,
            'reconstruct_object'=>$request->reconstruct_object,
            'done'=>$request->done,
            'who_allocate_funds'=>$request->who_allocate_funds,
            'total_sum'=>$request->total_sum,
            'building_organization'=>$request->building_organization,
            'boss_organization'=>$request->boss_organization,
            'region'=>$request->region,            
        ]);
        return ResponseController::success();
    }
    public function view_construction(){
        $all_kk=Construction::where('region',"Qoraqalpog'iston")->get();
        $all_kh=Construction::where('region','Xorazm')->get();
        $all["Qoraqalpog'iston"]=$all_kk;
        $all["Xorazm"]=$all_kh;
        return ResponseController::data($all);
    }
}
