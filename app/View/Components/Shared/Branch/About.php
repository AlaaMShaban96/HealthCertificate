<?php

namespace App\View\Components\Shared\Branch;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class About extends Component
{
    public $branch,$numberRequestToday,$numberPatientToday;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($branch)
    {
        $this->branch = $branch;
        $this->getStatistics();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.branch.about');
    }
    private function getStatistics()
    {
        // $this->numberRequestToday=$this->branch->requests()->whereDate('created_at', DB::raw('CURDATE()'))->get()->count();
        $this->numberRequestToday=$this->branch->requests()->where('created_at', 'like', date('Y-m-d').'%')->get()->count();
        $this->numberPatientToday=$this->branch->patients()->where('created_at', 'like', date('Y-m-d').'%')->get()->count();
    }
}
