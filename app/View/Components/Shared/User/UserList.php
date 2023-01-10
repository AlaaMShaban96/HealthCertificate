<?php

namespace App\View\Components\Shared\User;

use App\Models\Branch;
use Illuminate\View\Component;

class UserList extends Component
{
    public $users,$branches ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($users,Branch $branchRepo)
    {
        $this->users = $users;
        $this->branches  = $branchRepo->pluck('id','name');
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.user.user-list');
    }
}
