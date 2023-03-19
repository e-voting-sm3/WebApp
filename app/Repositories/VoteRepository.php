<?php 

namespace App\Repositories;
use App\Models\Vote;
use App\Models\Voter;
use App\Models\Candidate;

class VoteRepository
{
  private $votes;

  public function __construct(Vote $votes)
  {
    $this->votes = $votes;
  }

  public function getResults()
  {
    $result = $this->votes->all();
    return $result;
  }


  public function voteCandidate(array $data)
  {
      $voterId = $data['voter_id'];
      $candidateId = $data['candidate_id'];
      
      // cek apakah voter sudah pernah vote
      $hasVoted = $this->votes->where('voter_id', $voterId)->exists();
      
      if ($hasVoted) {
          return response()->json(['message' => 'You have already voted'], 400);
      }
      
      // cek apakah kandidatnya ada
      $candidate = Candidate::find($candidateId);
      if (!$candidate) {
          return response()->json(['message' => 'Candidate not found'], 404);
      }
      
      // vote
      $vote = $this->votes->create([
          'voter_id' => $voterId,
          'candidate_id' => $candidateId,
      ]);
      
      return response()->json(['message' => 'Vote submitted successfully']);
  }

}
?>