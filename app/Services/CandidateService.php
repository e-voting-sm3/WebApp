<?php

namespace App\Services;

use App\Repositories\CandidateRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateService
{
    private $candidateRepository;

    public function __construct(CandidateRepository $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function getAll()
    {
        return $this->candidateRepository->getAll();
    }

    public function getCandidateById($id)
    {
      return $this->candidateRepository->getCandidateById($id);
    }

    public function createCandidate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo->storeAs('public/image', $photo->hashName());

            $candidateData = [
                'name' => $request->name,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'photo' => $photo->hashName(),
            ];

            return $this->candidateRepository->createCandidate($candidateData);
        } else {
            return response()->json([
                'message' => 'Please provide both image and video files'
            ], 400);
        }
    }

    public function updateCandidate(Request $request, $id)
    {
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo->storeAs('public/image', $photo->hashName());

            $candidateData = [
                'name' => $request->name,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'photo' => $photo->hashName()
            ];
            
            // $candidateData['photo'] = $photo->hashName();

            // delete old photo
            $candidate = $this->candidateRepository->getCandidateById($id);
            Storage::delete('public/image/'.$candidate->photo);
        }

        return $this->candidateRepository->updateCandidate($id, $candidateData);
    }

    public function deleteCandidate($id)
    {
        // delete photo
        $candidate = $this->candidateRepository->getCandidateById($id);
        Storage::delete('public/image/'.$candidate->photo);

        return $this->candidateRepository->deleteCandidate($id);
    }
}
