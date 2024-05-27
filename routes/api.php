<?php

use App\Http\Controllers\Api\AssesmentDetailController;
use App\Http\Controllers\Api\AssesmentGroupController;
use App\Http\Controllers\Api\LectureController;
use App\Http\Controllers\Api\SemesterController;
use App\Http\Controllers\Api\SpecialistController;
use App\Http\Controllers\Api\SpecialistGroupController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\YearController;

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
Route::get('reset', function (){
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');
});

    Route::post("register", [UserController::class,"store"]);
 
    Route::post("genToken", [UserController::class, "genToken"]);
    Route::group(["middleware"=>["auth:api","validate_header"]], function(){
        Route::group(['prefix' => 'v1'], function () {
            Route::group(['prefix' => 'auth'], function () {  
                Route::post("genToken", [UserController::class, "genToken"]);
            });
            Route::group(['prefix' => 'result'], function () { 
                Route::get("viewresultbbyid/{id}", [UserController::class, "viewresultbbyid"]);
            });
        });
    });
 