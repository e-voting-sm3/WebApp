<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TimingVoteController;
use App\Http\Controllers\UserController;

Route::group([
  'prefix' => 'auth'
], function () {
  Route::post('register', [AuthController::class,'register']);
  Route::post('login', [AuthController::class,'login']);
  Route::group([
    'middleware' => 'auth:api'
  ], function(){
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class,'me']);

    // voting process
    Route::group([
      'middleware' => 'auth:api'
    ], function () {
        Route::get('candidates', [CandidateController::class,'index']);
        Route::get('candidates/{id}', [CandidateController::class,'show']);
        Route::post('candidates', [CandidateController::class,'store']);
        Route::post('candidates/{id}', [CandidateController::class,'update']);
        Route::delete('candidates/{id}', [CandidateController::class,'destroy']);
        // Route::apiResource('candidates', CandidateController::class);

        Route::apiResource('voters', UserController::class);

        Route::get('time', [TimingVoteController::class,'index']);
        Route::get('time/{id}', [TimingVoteController::class,'show']);
        Route::post('time/{id}', [TimingVoteController::class,'update']);

        Route::get('votes', [VoteController::class,'index']);
        Route::post('votes', [VoteController::class,'store']);
    });
    
  });
});
Route::get('candidates', [CandidateController::class,'index']);
// tanpa auth
// Route::apiResource('candidates', CandidateController::class);
// Route::apiResource('voters', VoterController::class);
// Route::get('votes', [VoteController::class,'index']);
// Route::post('votes', [VoteController::class,'store']);