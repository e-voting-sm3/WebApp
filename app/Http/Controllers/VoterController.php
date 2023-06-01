<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voter;
use App\Services\VoterService;

class VoterController extends Controller
{
    private $voterService;

    public function __construct(VoterService $voterService)
    {
        $this->voterService = $voterService;
    }

    public function index()
    {
        $voter = $this->voterService->getAll();

        return response()->json([
            'data' => $voter
        ]);
    }

    public function getVoterStatusTrue()
    {
        $voterTrue = $this->voterService->getVoterStatusTrue();

        return response()->json([
            'data' => $voterTrue
        ]);
    }

    public function getVoterStatusFalse()
    {
        $voterFalse = $this->voterService->getVoterStatusFalse();

        return response()->json([
            'data' => $voterFalse
        ]);
    }

    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'nrp' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:voters',
    //     ]);

    //     $voter = Voter::find($id);
    //     $voter->name = $request->name;
    //     $voter->nrp = $request->nrp;
    //     $voter->email = $request->email;
    //     $voter->save();

    //     return response()->json([
    //         'data' => $voter
    //     ]);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
