<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\jt\SubjectController;
use App\Http\Controllers\jt\ScheduleController;
use App\Http\Controllers\operativ\PlanController;
use App\Http\Controllers\jt\CompetitionController;

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

    });
    Route::prefix('tm-boshqarma')->group(function(){

    });
    Route::prefix('front-orti')->group(function(){

    });
    Route::prefix('kadrlar')->group(function(){

    });
    Route::prefix('tibbiy-tashkilot')->group(function(){

    });
    Route::prefix('schr')->group(function(){

    });
    Route::prefix('uy-joy')->group(function(){

    });
    Route::prefix('tugilgan-kunlar')->group(function(){

    });
    Route::prefix('harbiy-kasbiy')->group(function(){

    });
    Route::prefix('qushinlar')->group(function(){

    });
    
});
