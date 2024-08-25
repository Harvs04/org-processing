<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\PanelInterview;
use App\Models\User;
use App\Models\Reporting;
use App\Models\MillionDollarIdea;
use Carbon\Carbon;

class ApplicantController extends Controller
{

    public static $REPORTING_START_DATE = '2025-01-01';
    public static $REPORTING_END_DATE = '2025-01-15';
    public static $PANEL_INTERVIEW_DATE = '2024-12-25';
    public static $MDI_SUBMISSION_DATE = '2025-01-16';
    public static $MDI_PRESENTATION_DATE = '2025-01-30';
    public $user;
    public function index()
    {
        $this->user = Auth::user();
        // Fetch groups for the authenticated user
        $group = Group::where('user_id', $this->user->id)->where('type', 'panel_interview')->get()->first();
        if (isset($group)) {
            $panel_interview = PanelInterview::where('group_id', $group->applicant_group_id)->get()->first();
            $groupmates = User::join('groups', 'users.id', '=', 'groups.user_id')
                ->where('groups.applicant_group_id', $group->applicant_group_id)
                ->select('users.*')
                ->get();
        } else {
            $panel_interview = null;
            $groupmates = null;
        }
        return view('Applicant.panel-interview', [
            'group' => $group,
            'panel_interview_date' => self::$PANEL_INTERVIEW_DATE,
            'panel' => $panel_interview,
            'groupmates' => $groupmates
        ]);
    }

    public function reporting_list ()
    {
        $this->user = Auth::user();                                             // current user
        $all_developers = User::where('role', 'Developer')->get();              // all developers
        $reportings = Reporting::where('applicant_id', $this->user->id)->get(); // array of reportings assigned to applicant
        
        // all teams of developers with all of its reporters per developer
        $teams = [
            'Academic' => [],
            'Logistics' => [],
            'Membership' => [],
            'Documentation' => [],
            'Finance' => [],
            'Publicity' => [] 
        ];

        $overlap = [
            'Academic' => [],
            'Logistics' => [],
            'Membership' => [],
            'Documentation' => [],
            'Finance' => [],
            'Publicity' => [] 
        ];

        foreach ($all_developers as $developer) {
            // all reporting records
            $reporting_records = Reporting::where('developer_id', $developer->id)->get();
        
            // all applicant ids
            $applicant_ids = $reporting_records->pluck('applicant_id');
        
            // get Users using applicant id
            $reporting_applicants = User::whereIn('id', $applicant_ids)->get();
            
            // insert the user in its reporting developer
            if (!isset($teams[$developer->team])) {
                $teams[$developer->team] = [];
            }
        
            $teams[$developer->team][$developer->id] = $reporting_applicants;
        }

        foreach ($reportings as $reporting) {
            $developerId = $reporting->developer_id;
            $developer = User::where('id', $reporting->developer_id)->first();
            $developerFirstName = $developer->first_name . ' "' . $developer->nickname . '" ' . $developer->last_name;
            
            foreach ($teams as $teamName => $developers) {
                if (isset($developers[$developerId])) {
                    // ensure that the team exists in the overlap array
                    if (!isset($overlap[$teamName])) {
                        $overlap[$teamName] = [];
                    }
                    
                    // copy the developer and their reporting applicants to the overlap array
                    $overlap[$teamName][$developerFirstName] = $developers[$developerId];
                }
            }
        }
        
        $total_reporting_count = count($reportings);
        $accomplished_reporting_count = 0;


        foreach ($reportings as $reporting) {
            if ($reporting->status !== "Accomplished" && now()->greaterThan(Carbon::parse(self::$REPORTING_END_DATE))) {
                $reporting->status = "Failed";
            }

            if ($reporting->status === "Accomplished") {
                $accomplished_reporting_count++;
            }
            $reporting->save();
        }

        $developers = [
            'Academic' => [],
            'Logistics' => [],
            'Membership' =>[],
            'Documentation' => [],
            'Finance' => [],
            'Publicity' => []
        ];

        foreach ($reportings as $reporting) {
            $developer = User::find($reporting->developer_id);
            if ($developer) {
                $team = $developer->team;
        
                if (isset($developers[$team])) {
                    $developers[$team][] = [
                        'developer' => $developer,
                        'status' => $reporting->status
                    ];
                }
            }
        }

        return view('Applicant.reporting', [
            'developers' => $developers, 
            'overlap' => $overlap,
            'total_reporting_count' => $total_reporting_count,
            'accomplished_reporting_count' => $accomplished_reporting_count,
            'start_date' => self::$REPORTING_START_DATE,
            'end_date' => self::$REPORTING_END_DATE
        ]);
    }

    public function mdi()
    {
        $this->user = Auth::user();
        $mdi = null;
        $groupmates = null;

        $group = Group::where('user_id', $this->user->id)->where('type', 'mdi')->get()->first();
        if (isset($group)) {
            $mdi = MillionDollarIdea::where('group_id', $group->applicant_group_id)->get()->first();
            $groupmates = User::join('groups', 'users.id', '=', 'groups.user_id')
                ->where('groups.applicant_group_id', $group->applicant_group_id)
                ->select('users.*')
                ->get();
        }

        return view('Applicant.mdi', [
            'deadline' => self::$MDI_SUBMISSION_DATE,
            'presentation_date' => self::$MDI_PRESENTATION_DATE,
            'mdi' => $mdi,
            'groupmates' => $groupmates
        ]);
    }
}
