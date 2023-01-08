<?php

namespace App\View\Components\Branch;

use Illuminate\View\Component;

class Dashboard extends Component
{
    public $nationalitys;
    public $tests;
    public $identityTypes;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tests, $nationalitys, $identityTypes)
    {
        $this->tests = $tests;
        $this->identityTypes = $identityTypes;
        $this->nationalitys = $nationalitys;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.branch.dashboard');
    }
}
