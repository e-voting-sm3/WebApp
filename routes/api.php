<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\VoteController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('candidates', CandidateController::class);
Route::apiResource('voters', VoterController::class);
// Route::apiResource('votes', VoteController::class);

Route::get('votes', [voteController::class,'index']);
Route::post('votes', [voteController::class,'store']);

// Route::apiResource('voters', 'VoterController');
// Route::apiResource('elections', 'ElectionController');
// Route::apiResource('votes', 'VoteController');