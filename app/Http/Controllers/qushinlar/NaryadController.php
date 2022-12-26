<?php

namespace App\Http\Controllers\qushinlar;

use App\Models\Construction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Models\Naryad1;
use App\Models\Naryad2;
use App\Models\Naryad3;
use Carbon\Carbon;

class NaryadController extends Controller
{
    public function add_1(Request $request){
        Naryad1::create([
            'rank'=>$request->rank,
            'fio'=>$request->fio,
            'date'=>$request->date,                
        ]);
        return ResponseController::success();
    }
    public function view_1(){
        $all=Naryad1::whereMonth('date',Carbon::now()->month)->get();
        return ResponseController::data($all);
    }
    public function add_2(Request $request){
        Naryad2::create([
            'rank'=>$request->rank,
            'fio'=>$request->fio,
            'date'=>$request->date,                
        ]);
        return ResponseController::success();
    }
    public function view_2(){
        $all=Naryad2::whereMonth('date',Carbon::now()->month)->get();
        return ResponseController::data($all);
    }
    public function add_3(Request $request){
        Naryad3::create([
            'rank'=>$request->rank,
            'fio'=>$request->fio,
            'date'=>$request->date,                
        ]);
        return ResponseController::success();
    }
    public function view_3(){
        $all=Naryad3::whereMonth('date',Carbon::now()->month)->get();
        return ResponseController::data($all);
    }
}
