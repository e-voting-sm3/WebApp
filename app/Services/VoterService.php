<?php 

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Repositories\VoterRepository;


class VoterService
{
  private $voterRepository;

  public function __construct(VoterRepository $voterRepository)
  {
    $this->voterRepository = $voterRepository;
  }

  public function getAll()
  {
    return $this->voterRepository->getAll();
  }

  public function createVoter(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'nrp' => 'required|string|max:255',
      'email' => 'required|email|unique:voters,email',
    ]);

    $voterData = [
      'name' => $request->name,
      'nrp' => $request->nrp,
      'email' => $request->email
    ];
    
    return $this->voterRepository->createVoter($voterData);
  }
}

?>