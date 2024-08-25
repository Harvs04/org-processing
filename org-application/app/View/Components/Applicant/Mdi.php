<?php

namespace App\View\Components\Applicant;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Mdi extends Component
{
    /**
     * Create a new component instance.
     */
    public $deadline;
    public $presentation_date;
    public $mdi;
    public $groupmates;
    public function __construct($deadline, $presentationdate, $mdi, $groupmates)
    {
        $this->deadline = $deadline;
        $this->presentation_date = $presentationdate;
        $this->mdi = $mdi; 
        $this->groupmates = $groupmates;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.applicant.mdi', [
            'deadline' => $this->deadline, 
            'presentation_date' => $this->presentation_date,
            'mdi' => $this->mdi,
            'groupmates' => $this->groupmates
        ]);
    }
}
