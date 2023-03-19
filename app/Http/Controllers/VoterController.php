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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nrp' => 'required|string|max:255',
            'email' => 'required|email|unique:voters,email',
        ]);

        $voter = $this->voterService->createVoter($request);

        return response()->json([
            'data' => $voter
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nrp' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:voters',
        ]);

        $voter = Voter::find($id);
        $voter->name = $request->name;
        $voter->nrp = $request->nrp;
        $voter->email = $request->email;
        $voter->save();

        return response()->json([
            'data' => $voter
        ]);
    }

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
