<?php

namespace App\Http\Controllers\jt;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function add(Request $request){
        $name=$request->name;
        Subject::create([
            'name'=>$name
        ]);
        return ResponseController::success();
    }
    public function delete($id){
        Subject::where('id',$id)->delete();
        return ResponseController::success();
    }
    public function view(){
        $all=Subject::all();
        return ResponseController::data($all);
    }
}
