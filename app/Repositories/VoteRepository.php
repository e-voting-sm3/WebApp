<?php 

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use App\Models\Vote;
use App\Models\Voter;
use App\Models\User;
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
      $total_votes = DB::table('votes')->count();
  
      $results = DB::table('candidates')
          ->leftJoin('votes', 'candidates.id', '=', 'votes.candidate_id')
          ->select('candidates.id', 'candidates.photo', 'candidates.name', DB::raw('IFNULL(ROUND((COUNT(votes.voter_id) / '.$total_votes.') * 100), 0) as percentage'))
          ->groupBy('candidates.id', 'candidates.photo', 'candidates.name')
          ->get();
  
      return $results;
  }
  
  




  public function voteCandidate(array $data)
  {
      $voterId = $data['voter_id'];
      $candidateId = $data['candidate_id'];
      
      // cek apakah voter sudah pernah vote
      $hasVoted = $this->votes->where('voter_id', $voterId)->exists();
      
      if ($hasVoted) {
          return 'You have already voted';
      }
      
      // cek apakah kandidatnya ada
      $candidate = Candidate::find($candidateId);
      if (!$candidate) {
          return 'Candidate not found';
      }
      

      // vote
      $vote = $this->votes->create([
          'voter_id' => $voterId,
          'candidate_id' => $candidateId,
      ]);

      $statusUser = User::find($voterId);
      $statusUser->status = 'true';
      $statusUser->save();
      
      return 'Vote submitted successfully';
  }

}
?>