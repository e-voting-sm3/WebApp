<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Resources\TimingVoteResource;
use App\Models\TimingVote;

class TimingVoteController extends Controller
{
    public function index()
    {
        $timingVotes = TimingVote::get();

        return response()->json([
            'data' => $timingVotes
        ]);
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'start_time' => 'required',
    //         'end_time' => 'required',
    //     ]);

    //     $timingVotes = TimingVote::create([
    //         'start_time' => $request->input('start_time'),
    //         'end_time' => $request->input('end_time'),
    //     ]);

    //     return response()->json([
    //         'data' => $timingVotes
    //     ]);
    // }

    public function show($id)
    {
        $timingVotes = TimingVote::find($id);

        if (!$timingVotes) {
            return response()->json([
                'message' => 'Timming vote not found',
            ], 404);
        }

        return response()->json([
            'data' => $timingVotes
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $timingVotes = TimingVote::find($id);

        if (!$timingVotes) {
            return response()->json([
                'message' => 'Timming vote not found',
            ], 404);
        }

        $timingVotes->start_time = $request->input('start_time');
        $timingVotes->end_time = $request->input('end_time');
        $timingVotes->save();

        return response()->json([
            'data' => $timingVotes
        ]);
    }

    public function destroy($id)
    {
        $timingVotes = TimingVote::find($id);

        if (!$timingVotes) {
            return response()->json([
                'message' => 'Timming vote not found',
            ], 404);
        }

        $timingVotes->delete();

        return response()->json([
            'message' => 'Timming vote deleted successfully',
        ], 200);
    }
}
