<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CandidateService;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $candidateService;

    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService = $candidateService;
    }

    public function index()
    {
        $candidates = $this->candidateService->getAll();

        return response()->json([
            'data' => $candidates
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'visi_misi' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $candidate = $this->candidateService->createCandidate($request);

        return response()->json([
            'data' => $candidate
        ]);
    }

    public function show($id)
    {
        $candidate = $this->candidateService->getCandidateById($id);

        return response()->json([
            'data' => $candidate
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'visi_misi' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $candidate = $this->candidateService->updateCandidate($request, $id);

        return response()->json([
            'data' => $candidate
        ]);
    }

    public function destroy($id)
    {
        $this->candidateService->deleteCandidate($id);

        return response()->json([
            'message' => 'Candidate deleted'
        ]);
    }
}
