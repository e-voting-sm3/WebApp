<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // name, foto, visi misi
    public function index()
    {
        $candidates = Candidate::get();

        return response()->json([
            'data' => $candidates
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
            'name' => 'required',
            'visi_misi' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo->storeAs('public/image', $photo->hashName());

            $candidate = new Candidate();
            $candidate->name = $request->name;
            $candidate->visi_misi = $request->visi_misi;
            $candidate->photo = $photo->hashName();
            $candidate->save();

            return response()->json([
                'data' => $candidate
            ]);
        } else {
            return response()->json([
                'message' => 'Please provide both image and video files'
            ], 400);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidate::find($id);

        return response()->json([
            'data' => $candidate
        ]);
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
            'name' => 'required',
            'visi_misi' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $candidate = Candidate::find($id);
        if (!$candidate) {
            return response()->json([
                'message' => 'Candidate not found'
            ], 404);
        }

        $candidate->name = $request->input('name');
        $candidate->visi_misi = $request->visi_misi;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo->storeAs('public/image', $photo->hashName());

            // delete old photo
            Storage::delete('public/image/'.$candidate->photo);

            // update photo
            $candidate->photo = $photo->hashName();
        }

        $candidate->save();

        return response()->json([
            'data' => $candidate
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
        $candidate = Candidate::find($id);
        $candidate->delete();

        return response()->json([
            'message' => 'Candidate deleted'
        ]);
    }
}
