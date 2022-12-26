<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\jt\SubjectController;
use App\Http\Controllers\jt\ScheduleController;
use App\Http\Controllers\moddiy\FoodController;
use App\Http\Controllers\moddiy\FuelController;
use App\Http\Controllers\qurol\WeaponController;
use App\Http\Controllers\operativ\PlanController;
use App\Http\Controllers\qurol\TechnicController;
use App\Http\Controllers\uyjoy\HousingController;
use App\Http\Controllers\jt\CompetitionController;
use App\Http\Controllers\moddiy\ClothesController;
use App\Http\Controllers\tibbiy\MedicalController;
use App\Http\Controllers\safarbarlik\MobilizationController;

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

        Route::post('/operativ/add',[FuelController::class,'add_operativ']);
        Route::get('/operativ/view',[FuelController::class,'view_operativ']);

        Route::post('/troops/add',[FuelController::class,'add_troops']);
        Route::get('/troops/view',[FuelController::class,'view_troops']);

        //Kiyim-kechak xizmati
        Route::post('/clothes/add',[ClothesController::class,'add']);
        Route::get('/clothes/view',[ClothesController::class,'view']);

        Route::post('/schrclothes/add',[ClothesController::class,'add_schr']);
        Route::get('/schrclothes/view',[ClothesController::class,'view_schr']);

        Route::post('/contractclothes/add',[ClothesController::class,'add_contract']);
        Route::get('/contractclothes/view',[ClothesController::class,'view_contract']);

        //Oziq-ovqat xizmati
        Route::post('/food/add',[FoodController::class,'add']);
        Route::get('/food/view',[FoodController::class,'view']);

        Route::post('/schrfood/add',[FoodController::class,'add_schr']);
        Route::get('/schrfood/view',[FoodController::class,'view_schr']);

        Route::post('/budjetfood/add',[FoodController::class,'add_budjet']);
        Route::get('/budjetfood/view',[FoodController::class,'view_budjet']);
        
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
        //1-sonli yopiq shaxarcha xizmat lavozim uylari
        Route::post('/housing1/add',[HousingController::class,'add']);
        Route::get('/housing1/view',[HousingController::class,'view']);
        //Oficerlar yotoqxonasida yashayaotgan xarbiy xizmatchilar
        Route::post('/housing_oficers/add',[HousingController::class,'add_oficer']);
        Route::get('/housing_oficers/view',[HousingController::class,'view_oficer']);
        //Amalga oshirilayotgan qurilish ishlari
        Route::post('/contruction/add',[HousingController::class,'add_construction']);
        Route::get('/contruction/view',[HousingController::class,'view_construction']);
    });
    Route::prefix('tugilgan-kunlar')->group(function(){
        Route::post('/add',[BirthdayController::class,'add']);
        Route::get('/view',[BirthdayController::class,'view']);
    });
    Route::prefix('harbiy-kasbiy')->group(function(){

    });
    Route::prefix('qushinlar-xizmati')->group(function(){
        //1-darajali naryadlar
        Route::post('/naryad1/add',[NaryadController::class,'add_1']);
        Route::get('/naryad1/view',[NaryadController::class,'view_1']);
        //2-darajali naryadlar
        Route::post('/naryad2/add',[NaryadController::class,'add_1']);
        Route::get('/naryad2/view',[NaryadController::class,'view_1']);
        //3-darajali naryadlar
        Route::post('/naryad3/add',[NaryadController::class,'add_3']);
        Route::get('/naryad3/view',[NaryadController::class,'view_3']);
    });
    
});
