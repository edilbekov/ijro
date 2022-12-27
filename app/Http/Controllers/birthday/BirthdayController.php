<?php

namespace App\Http\Controllers\birthday;

use Carbon\Carbon;
use App\Models\Birthday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;

class BirthdayController extends Controller
{
    public function add(Request $request){             
        $age=Carbon::now()->year;////Carbon::createFromFormat('Y-m-d H:i:s', $time)->year        
        $date=new Carbon($request->date);
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
