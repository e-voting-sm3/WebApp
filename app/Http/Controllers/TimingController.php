<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimingController extends Controller
{
    public function setVotingTime(Request $request, $id)
    {
        // $request->validate([
        //     'start_time' => 'required|date',
        //     'end_time' => 'required|date|after:start_time',
        // ]);

        // $voting = Voting::find($id);
        // if (!$voting) {
        //     return response()->json(['message' => 'Voting not found'], 404);
        // }

        // $voting->start_time = Carbon::parse($request->start_time)->toDateTimeString();
        // $voting->end_time = Carbon::parse($request->end_time)->toDateTimeString();
        // $voting->save();

        // return response()->json([
        //     'message' => 'Voting time updated successfully',
        //     'data' => $voting
        // ]);
    }
}
