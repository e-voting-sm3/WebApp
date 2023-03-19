<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VoteService;

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
