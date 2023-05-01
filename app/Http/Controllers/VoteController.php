<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VoteService;
use Carbon\Carbon;
use App\Models\TimingVote;

class VoteController extends Controller
{
    private $voteService;

    public function __construct(VoteService $voteService)
    {
        $this->voteService = $voteService;
    }

    public function index()
    {
        $votes = $this->voteService->getResults();

        return response()->json([
            'data' => $votes
        ]);
    }

    public function store(Request $request)
    {
        $timingVote = TimingVote::first();

        $data = json_decode($timingVote);
        $startTime = Carbon::parse($data->start_time);
        $endTime = Carbon::parse($data->end_time);
        $currentTime = Carbon::now();

        
        if (!$currentTime->between($startTime, $endTime)) {
            return response()->json([
                'message' => 'Maaf, waktu pemilihan sudah berakhir.'
            ]);
        }

        $validatedData = $request->validate([
            'voter_id' => 'required',
            'candidate_id' => 'required',
        ]);

        $vote = $this->voteService->voteCandidate($request);

        return response()->json([
            'data' => $vote
        ]);
    }
}