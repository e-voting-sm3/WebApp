<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AuthController;

// Route::group([
//   'prefix' => 'auth'
// ], function () {
//   Route::post('register', [AuthController::class,'register']);
//   Route::post('login', [AuthController::class,'login']);
//   Route::group([
//     'middleware' => 'auth:api'
//   ], function(){
//     Route::post('logout', [AuthController::class,'logout']);
//     Route::post('refresh', [AuthController::class, 'refresh']);
//     Route::post('me', [AuthController::class,'me']);

//     // voting process
//     Route::group([
//       'middleware' => 'auth:api'
//     ], function () {
//         Route::apiResource('candidates', CandidateController::class);
//         Route::apiResource('voters', VoterController::class);
//         Route::get('votes', [VoteController::class,'index']);
//         Route::post('votes', [VoteController::class,'store']);
//     });
    
//   });
// });

// tanpa auth
Route::apiResource('candidates', CandidateController::class);
Route::apiResource('voters', VoterController::class);
Route::get('votes', [VoteController::class,'index']);
Route::post('votes', [VoteController::class,'store']);