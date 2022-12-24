<?php

namespace App\Http\Controllers\safarbarlik;

use Illuminate\Http\Request;
use App\Models\Mobilizationkh;
use App\Models\Mobilizationkk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ResponseController;

class MobilizationController extends Controller
{
    public function add_kk(Request $request){
        $role  = $request->user()->role;
        if($role != "admin"){
            return ResponseController::error('No permission', 403);
        }
        $validation = Validator::make($request->all(), [
            'mib_name'=>'required',
            'fio'=>'required',
            'sum'=>'required',
            'date'=>'required',            
            'initial_sum'=>'required',                                     
            'naryad'=>'required',
            'full_paid'=>'required',
            'partially_paid'=>'required',            
        ]);
        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        } 
        $sum=$request->sum;
        $initial_sum=$request->initial_sum;
        $done=($initial_sum/$sum)*100;
        
        $full_paid=$request->full_paid;
        $partially_paid=$request->partially_paid;
        $no_paid=$full_paid-$partially_paid;
        Mobilizationkk::create([
            'mib_name'=>$request->mib_name,
            'fio'=>$request->fio,
            'sum'=>$sum,
            'date'=>$request->date,
            'month_percent'=>$request->month_percent,
            'initial_sum'=>$initial_sum,
            'residual'=>$request->residual,
            'done'=>$done,            
            'naryad'=>$request->naryad,
            'full_paid'=>$full_paid,
            'partially_paid'=>$partially_paid,
            'no_paid'=>$no_paid,
        ]);
        return ResponseController::success();
    }
    public function update_kk(Request $request,$id){
        $role  = $request->user()->role;
        if($role != "admin"){
            return ResponseController::error('No permission', 403);
        }
        $validation = Validator::make($request->all(), [
            'mib_name'=>'required',
            'fio'=>'required',
            'sum'=>'required',
            'date'=>'required',            
            'initial_sum'=>'required',                                     
            'naryad'=>'required',
            'full_paid'=>'required',
            'partially_paid'=>'required',            
        ]);
        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        } 
        $sum=$request->sum;
        $initial_sum=$request->initial_sum;
        $done=($initial_sum/$sum)*100;
        
        $full_paid=$request->full_paid;
        $partially_paid=$request->partially_paid;
        $no_paid=$full_paid-$partially_paid;
        Mobilizationkk::where('id',$id)->update([
            'mib_name'=>$request->mib_name,
            'fio'=>$request->fio,
            'sum'=>$sum,
            'date'=>$request->date,
            'month_percent'=>$request->month_percent,
            'initial_sum'=>$initial_sum,
            'residual'=>$request->residual,
            'done'=>$done,            
            'naryad'=>$request->naryad,
            'full_paid'=>$full_paid,
            'partially_paid'=>$partially_paid,
            'no_paid'=>$no_paid,
        ]);
        return ResponseController::success();
    }
    public function view_kk(){
        $all=Mobilizationkk::all();
        $sum=0;
        $initial_sum=0;
        $naryad=0;
        $full_paid=0;
        $partially_paid=0;
        $no_paid=0;
        foreach($all as $value){
            $sum+=$value['sum'];
            $initial_sum+=$value['initial_sum'];
            $naryad+=$value['naryad'];
            $full_paid+=$value['full_paid'];
            $partially_paid+=$value['partially_paid'];
            $no_paid+=$value['full_paid'];
        }
        $done=($initial_sum/$sum)*100;
        $total=['sum'=>$sum,'initial_sum'=>$initial_sum,'done'=>$done,'naryad'=>$naryad,'full_paid'=>$full_paid,'partially_paid'=>$partially_paid,'no_paid'=>$no_paid];
        $all[]=$total;
        return ResponseController::data($all);
    }
    public function add_kh(Request $request){
        $role  = $request->user()->role;
        if($role != "admin"){
            return ResponseController::error('No permission', 403);
        }
        $validation = Validator::make($request->all(), [
            'mib_name'=>'required',
            'fio'=>'required',
            'sum'=>'required',
            'date'=>'required',            
            'initial_sum'=>'required',                                     
            'naryad'=>'required',
            'full_paid'=>'required',
            'partially_paid'=>'required',            
        ]);
        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        } 
        $sum=$request->sum;
        $initial_sum=$request->initial_sum;
        $done=($initial_sum/$sum)*100;
        
        $full_paid=$request->full_paid;
        $partially_paid=$request->partially_paid;
        $no_paid=$full_paid-$partially_paid;
        Mobilizationkh::create([
            'mib_name'=>$request->mib_name,
            'fio'=>$request->fio,
            'sum'=>$sum,
            'date'=>$request->date,
            'month_percent'=>$request->month_percent,
            'initial_sum'=>$initial_sum,
            'residual'=>$request->residual,
            'done'=>$done,            
            'naryad'=>$request->naryad,
            'full_paid'=>$full_paid,
            'partially_paid'=>$partially_paid,
            'no_paid'=>$no_paid,
        ]);
        return ResponseController::success();
    }
    public function update_kh(Request $request,$id){
        $role  = $request->user()->role;
        if($role != "admin"){
            return ResponseController::error('No permission', 403);
        }
        $validation = Validator::make($request->all(), [
            'mib_name'=>'required',
            'fio'=>'required',
            'sum'=>'required',
            'date'=>'required',            
            'initial_sum'=>'required',                                     
            'naryad'=>'required',
            'full_paid'=>'required',
            'partially_paid'=>'required',            
        ]);
        if($validation->fails()){
            return ResponseController::error($validation->errors()->first(), 422);            
        } 
        $sum=$request->sum;
        $initial_sum=$request->initial_sum;
        $done=($initial_sum/$sum)*100;
        
        $full_paid=$request->full_paid;
        $partially_paid=$request->partially_paid;
        $no_paid=$full_paid-$partially_paid;
        Mobilizationkh::where('id',$id)->update([
            'mib_name'=>$request->mib_name,
            'fio'=>$request->fio,
            'sum'=>$sum,
            'date'=>$request->date,
            'month_percent'=>$request->month_percent,
            'initial_sum'=>$initial_sum,
            'residual'=>$request->residual,
            'done'=>$done,            
            'naryad'=>$request->naryad,
            'full_paid'=>$full_paid,
            'partially_paid'=>$partially_paid,
            'no_paid'=>$no_paid,
        ]);
        return ResponseController::success();
    }
    public function view(){
        $all=Mobilizationkh::all();
        $sum=0;
        $initial_sum=0;
        $naryad=0;
        $full_paid=0;
        $partially_paid=0;
        $no_paid=0;
        foreach($all as $value){
            $sum+=$value['sum'];
            $initial_sum+=$value['initial_sum'];
            $naryad+=$value['naryad'];
            $full_paid+=$value['full_paid'];
            $partially_paid+=$value['partially_paid'];
            $no_paid+=$value['full_paid'];
        }
        $done=($initial_sum/$sum)*100;
        $total=['sum'=>$sum,'initial_sum'=>$initial_sum,'done'=>$done,'naryad'=>$naryad,'full_paid'=>$full_paid,'partially_paid'=>$partially_paid,'no_paid'=>$no_paid];
        $all[]=$total;
        return ResponseController::data($all);
    }
}
