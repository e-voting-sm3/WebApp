<?php

namespace App\Repositories;

use App\Models\Candidate;

class CandidateRepository
{
    private $candidate;

    public function __construct(Candidate $candidate)
    {
        $this->candidate = $candidate;
    }

    public function getAll()
    {
        return $this->candidate->all();
    }

    public function getCandidateById($id)
    {
        return $this->candidate->find($id);
    }

    public function createCandidate(array $data)
    {
        return $this->candidate->create($data);
    }

    public function updateCandidate($id, array $data)
    {
        $candidate = $this->candidate->find($id);
        $candidate->update($data);

        return $candidate;
    }

    public function deleteCandidate($id)
    {
        $candidate = $this->candidate->find($id);
        if (!$candidate) {
            throw new \Exception('Candidate not found');
        }
        $candidate->delete();
    }
    
}

