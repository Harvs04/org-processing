<?php

namespace App\View\Components\Applicant;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Http\Request;



class PanelInterview extends Component
{
    /**
     * Create a new component instance.
     */
    public $group;
    public $panel;
    public $groupmates = [];

    public function __construct($group, $panel, $groupmates)
    {
        $this->group = $group;
        $this->panel = $panel;
        $this->groupmates = $groupmates;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.applicant.panel-interview', ['group' => $this->group, 'panel' => $this->panel]);
    }
}
