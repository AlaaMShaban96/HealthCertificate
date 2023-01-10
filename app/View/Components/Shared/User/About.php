<?php

namespace App\View\Components\Shared\User;

use Illuminate\View\Component;

class About extends Component
{
    public $user,$numberRequestToday,$numberPatientToday,$numberRequestTotel,$numberPatientTotel;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->getStatistics();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.user.about');
    }  
    private function getStatistics()
    {
        // $this->numberRequestToday=$this->branch->requests()->whereDate('created_at', DB::raw('CURDATE()'))->get()->count();
        $this->numberRequestToday=$this->user->requests()->where('created_at', 'like', date('Y-m-d').'%')->get()->count();
        $this->numberPatientToday=$this->user->patients()->where('created_at', 'like', date('Y-m-d').'%')->get()->count();
        $this->numberRequestTotel=$this->user->requests()->count();
        $this->numberPatientTotel=$this->user->patients()->count();
    
    }
}
