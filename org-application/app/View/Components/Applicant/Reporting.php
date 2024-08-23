<?php

namespace App\View\Components\Applicant;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Reporting extends Component
{
    /**
     * Create a new component instance.
     */
    public $start_date;
    public $end_date;
    public $developers;

    public function __construct($startdate, $enddate, $developers)
    {
        $this->start_date = $startdate;
        $this->end_date = $enddate;
        $this->developers = $developers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.applicant.reporting', [
            'start_date' => $this->start_date, 
            'end_date' => $this->end_date, 
            'developers' => $this->developers
        ]);
    }
}
