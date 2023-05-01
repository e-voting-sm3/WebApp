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

        $current_time = Carbon::now();
        $timing_votes = TimingVote::orderBy('id', 'desc')->first();
            
        $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $timing_votes->start_time, 'Asia/Jakarta');
        $endTime = Carbon::createFromFormat('Y-m-d H:i:s', $timing_votes->end_time, 'Asia/Jakarta');
        $current_time = Carbon::now('Asia/Jakarta');

        if ($current_time->isBefore($startTime)) {
            return response()->json([
                'message' => 'Belum saatnya pemilihan dimulai.',
            ]);
        } elseif ($current_time->isAfter($endTime)) {
            $votes = $this->voteService->getResults();

            return response()->json([
                'data' => $votes
            ]);
        } else {
            return response()->json([
                'message' => 'Maaf pemilihan masih berlangsung',
            ]);
        }


    }

    public function store(Request $request)
    {
        $current_time = Carbon::now();
        $timing_votes = TimingVote::orderBy('id', 'desc')->first();
            
        $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $timing_votes->start_time, 'Asia/Jakarta');
        $endTime = Carbon::createFromFormat('Y-m-d H:i:s', $timing_votes->end_time, 'Asia/Jakarta');
        $current_time = Carbon::now('Asia/Jakarta');

        if ($current_time->isBefore($startTime)) {
            return response()->json([
                'message' => 'Belum saatnya pemilihan dimulai.',
                'startTime' => $startTime->toIso8601String(),
                'endTime' => $endTime->toIso8601String(),
                'current_time' => $current_time->toIso8601String(),
            ]);
        } elseif ($current_time->isAfter($endTime)) {
            return response()->json(['message' => 'Maaf, waktu pemilihan sudah berakhir.']);
        } else {
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
}