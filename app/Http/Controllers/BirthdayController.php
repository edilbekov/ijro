<?php

namespace App\Http\Controllers;

use App\Models\Birthday;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BirthdayController extends Controller
{
    public function add(Request $request){
        $year=$request->age;        
        $age=Carbon::now()->year;////Carbon::createFromFormat('Y-m-d H:i:s', $time)->year
        $date=new Carbon($year);
        $format=$date->format('Y');
        Birthday::create([
            'fio'=>$request->fio,
            'rank'=>$request->rank,
            'date'=>$request->date,
            'age'=>$age-$format,
            'phone'=>$request->phone
        ]);
        return ResponseController::success();
    }
    public function view(){
        $all=Birthday::all();
        return ResponseController::data($all);
    }
}
