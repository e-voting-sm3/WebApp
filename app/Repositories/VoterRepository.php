<?php 

namespace App\Repositories;
use App\Models\Voter;

class VoterRepository
{
  private $voter;

  public function __construct(Voter $voter)
  {
    $this->voter = $voter;
  }

  public function getAll()
  {
    return $this->voter->all();
  }

  public function createVoter(array $data)
  {
    return $this->voter->create($data);
  }
}

?>