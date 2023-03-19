<?php 

namespace App\Services;

use App\Repositories\VoteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VoteService
{
  private $voteRepository;

  public function __construct(VoteRepository $voteRepository)
  {
    $this->voteRepository = $voteRepository;
  }

  public function getResults()
  {
    return $this->voteRepository->getResults();
  }

  public function voteCandidate(Request $request)
  {
    $voteData = [
      'voter_id' => $request->voter_id,
      'candidate_id' => $request->candidate_id,
    ];

    return $this->voteRepository->voteCandidate($voteData);
  }

}
?>