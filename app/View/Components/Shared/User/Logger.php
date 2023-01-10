<?php

namespace App\View\Components\Shared\User;

use Illuminate\View\Component;

class Logger extends Component
{
    public $user,$logs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->logs = $user->logs()->orderBy('created_at', 'DESC')->paginate(5);
        // dd($user->logs);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.user.logger');
    }
}
