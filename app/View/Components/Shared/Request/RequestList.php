<?php

namespace App\View\Components\Shared\Request;

use App\Models\Test;
use Illuminate\View\Component;

class RequestList extends Component
{
    public $requests,$tests ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($requests,Test $testRepo)
    {
        $this->requests = $requests; 
        $this->tests  = $testRepo->all();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.request.request-list');
    }
}
