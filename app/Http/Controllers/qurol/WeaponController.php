<?php

namespace App\Http\Controllers\qurol;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ResponseController;
use App\Models\Weapon;

class WeaponController extends Controller
{
    public function add(Request $request){
        $validation = Validator::make($request->all(), [        
            'militaries'=>'required',
            'weapons'=>'required'
        ]);
        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        }
        $weapons=json_encode($request->weapons);
        Weapon::create([            
            'militaries'=>$request->militaries,
            'weapons'=>$weapons
        ]);
        return ResponseController::success();
    }
    public function update(Request $request,$id){
        $validation = Validator::make($request->all(), [                      
            'militaries'=>'required',
            'weapons'=>'required'
        ]);
        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        }
        
        $weapons=json_encode($request->weapons);
        Weapon::where('id',$id)->update([            
            'militaries'=>$request->militaries,
            'weapons'=>$weapons
        ]);
        return ResponseController::success();
    }
    public function view(){
        $all=Weapon::all();
        return ResponseController::data($all);
    }
}
