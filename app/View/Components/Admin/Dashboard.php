<?php

namespace App\View\Components\Admin;

use Carbon\Carbon;
use App\Models\Branch;
use App\Models\Patient;
use App\Models\Request;
use Illuminate\View\Component;

class Dashboard extends Component
{
    public $total_number_of_patients, $total_number_of_branches , $total_number_of_requests,$months;
    private $patientRepository, $branchRepository,$requestRepository;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Patient $patientRepo,Branch $branchRepo ,Request $requestRepo)
    {
        $this->requestRepository = $requestRepo;  
        $this->branchRepository = $branchRepo;  
        $this->patientRepository = $patientRepo;  
        $this->getTotalNumbers();
        $this->getStaticts();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.dashboard');
    }
    private function getTotalNumbers(){

        $this->total_number_of_patients=$this->requestRepository->count();
        $this->total_number_of_branches =$this->branchRepository->count();
        $this->total_number_of_requests=$this->patientRepository->count();
    }
    private function getStaticts()
    {
        $this->months= $this->branchRepository->with('requests')->get()->map(function($user, $key) {									
            return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'requests'=>$user->getRequestCountPerMonth()
                ];
            })->toArray();
      
    }
}
