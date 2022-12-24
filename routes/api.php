<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\jt\SubjectController;
use App\Http\Controllers\jt\ScheduleController;
use App\Http\Controllers\qurol\WeaponController;
use App\Http\Controllers\operativ\PlanController;
use App\Http\Controllers\qurol\TechnicController;
use App\Http\Controllers\jt\CompetitionController;
use App\Http\Controllers\safarbarlik\MobilizationController;
use App\Http\Controllers\tibbiy\MedicalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('jt')->group(function () {
        //Competition
        Route::post('/competition/add',[CompetitionController::class,'add']);
        Route::patch('/competition/edit/{id}',[CompetitionController::class,'edit']);
        Route::delete('/competition/delete/{id}',[CompetitionController::class,'delete']);
        Route::get('/competition/view',[CompetitionController::class,'view']);
        //Schedule
        Route::post('/schedule/add',[ScheduleController::class,'add']);
        Route::patch('/schedule/edit/{id}',[ScheduleController::class,'edit']);
        Route::delete('/schedule/delete/{id}',[ScheduleController::class,'delete']);
        Route::get('/schedule/view',[ScheduleController::class,'view']);
            //Subject
            Route::post('/subject/add',[SubjectController::class,'add']);            
            Route::delete('/subject/delete/{id}',[SubjectController::class,'delete']);
            Route::get('/subject/view',[SubjectController::class,'view']);
    });
    Route::prefix('operativ-boshqarma')->group(function(){
        //Month
        Route::post('/plan/add',[PlanController::class,'add']);
        Route::get('/plan/view',[PlanController::class,'view']);
        //Week
        Route::post('/plan/add_week',[PlanController::class,'add_week']);
        Route::get('/plan/view_week',[PlanController::class,'view_week']);
    });
    Route::prefix('qurol-aslaha')->group(function(){
        //Texnik taminot
        Route::post('/technic/add',[TechnicController::class,'add']);
        Route::patch('/technic/update/{id}',[TechnicController::class,'update']);
        Route::get('/technic/view',[TechnicController::class,'view']);
        //Qurol aslaha
        Route::post('/weapon/add',[WeaponController::class,'add']);
        Route::patch('/weapon/update/{id}',[WeaponController::class,'update']);
        Route::get('/weapon/view',[WeaponController::class,'view']);
        //Avtomobil texnikalari
        Route::post('/avto/add',[AvtoController::class,'add']);
        Route::patch('/avto/update/{id}',[AvtoController::class,'update']);
        Route::get('/avto/view',[AvtoController::class,'view']);
    });
    Route::prefix('tm-boshqarma')->group(function(){

    });
    Route::prefix('moddiy-taminot')->group(function(){
        //Yoqilg'i va moylash xizmati
        Route::post('/fuel/add',[FuelController::class,'add']);
        Route::get('/fuel/view',[FuelController::class,'view']);
        
    });
    Route::prefix('kadrlar')->group(function(){

    });
    Route::prefix('tibbiy-tashkilot')->group(function(){
        //Umumiy holat
        Route::post('/general/add',[MedicalController::class,'add']);
        Route::patch('/general/update/{id}',[MedicalController::class,'update']);
        Route::get('/general/view',[MedicalController::class,'view']);
        //Birlamchi murojatlar
        Route::post('/primary/add',[MedicalController::class,'add_primary']);
        Route::patch('/primary/update/{id}',[MedicalController::class,'update_primary']);
        Route::get('/primary/view',[MedicalController::class,'view_primary']);
    });
    Route::prefix('safarbarlik-boshqarmasi')->group(function(){
        //Qoraqalpog'iston
        Route::post('/qoraqalpogiston/add',[MobilizationController::class,'add_kk']);
        Route::patch('/qoraqalpogiston/update/{id}',[MobilizationController::class,'update_kk']);
        Route::post('/qoraqalpogiston/view',[MobilizationController::class,'view_kk']);
        //Xorazm
        Route::post('/xorazm/add',[MobilizationController::class,'add_kh']);
        Route::patch('/xorazm/update/{id}',[MobilizationController::class,'update_kh']);
        Route::post('/xorazm/view',[MobilizationController::class,'view_kh']);
    });
    Route::prefix('uy-joy')->group(function(){

    });
    Route::prefix('tugilgan-kunlar')->group(function(){

    });
    Route::prefix('harbiy-kasbiy')->group(function(){

    });
    Route::prefix('qushinlar-xizmati')->group(function(){

    });
    
});
