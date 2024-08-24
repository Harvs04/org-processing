<?php

namespace App\View\Components\Applicant;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Carbon\Carbon;

class Reporting extends Component
{
    /**
     * Create a new component instance.
     */
    public $start_date;
    public $end_date;
    public $developers;
    public $total_reporting_count;
    public $accomplished_reporting_count;
    public $overlap;

    public function __construct($startdate, $enddate, $developers, $totalreportingcount, $accomplishedreportingcount, $overlap)
    {
        $this->start_date = $startdate;
        $this->end_date = $enddate;
        $this->developers = $developers;
        $this->total_reporting_count = $totalreportingcount;
        $this->accomplished_reporting_count = $accomplishedreportingcount;
        $this->overlap = $overlap;
    }

    public function status_badge($developer) 
    {
        $status = $developer['status'];
        $class = $status === 'Pending' 
                    ? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300'
                    : ($status === 'In progress' 
                        ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300'
                        : ($status === 'Accomplished' 
                            ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300'
                            : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300')); 

        $text = $status === 'Pending' 
                    ? 'Pending' 
                    : ($status === 'In progress' 
                        ? 'In progress'     
                        : ($status === 'Accomplished' 
                            ? 'Accomplished' 
                            : 'Failed'));

        return ['class' => $class, 'text' => $text];
    }

    public function progress_badge($accomplished_count, $total_count) 
    {   
        $class = "";
        if (now()->greaterThan(Carbon::parse($this->end_date)) && $accomplished_count !== $total_count) {
            $class = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
        } else {
            if ($accomplished_count === 0) $class = 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300';
            else if ($accomplished_count > 0 && $accomplished_count < $total_count) $class = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300';
            else if ($accomplished_count === $total_count) $class = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300';
        }

        return $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.applicant.reporting', [
            'start_date' => $this->start_date, 
            'end_date' => $this->end_date, 
            'developers' => $this->developers,
            'total_reporting_count' => $this->total_reporting_count,
            'accomplished_reporting_count' => $this->accomplished_reporting_count,
            'overlap' => $this->overlap
        ]);
    }
}
