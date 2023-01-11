<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Back extends Component
{
    /**
     * @var String
     */
    public String $location;

    /**
     * Create a new component instance.
     * @param String $location
     *
     */
    public function __construct(String $location)
    {
        $this->location = $location;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.back');
    }
}
