<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voter;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voter = Voter::latest()->get();

        return response()->json([
            'data' => $voter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nrp' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:voters',
        ]);

        $voter = New Voter();
        $voter->name = $request->name;
        $voter->nrp = $request->nrp;
        $voter->email = $request->email;
        $voter->save();

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
