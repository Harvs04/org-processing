<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\PanelInterview;
use App\Models\User;
use App\Models\Reporting;

class ApplicantController extends Controller
{

    public static $REPORTING_START_DATE = "2025-01-01";
    public static $REPORTING_END_DATE = "2025-01-15";
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
            'nickname' => $this->user->nickname, 
            'group' => $group,
            'panel' => $panel_interview,
            'groupmates' => $groupmates
        ]);
    }

    public function reporting_list ()
    {
        $this->user = Auth::user();

        $reportings = Reporting::where('applicant_id', $this->user->id)->get(); // array of reportings assigned to applicant
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
                // Assume the developer has a 'team' attribute
                $team = $developer->team;
        
                if (isset($developers[$team])) {
                    $developers[$team][] = $developer;
                }
            }
        }

        return view('Applicant.reporting', [
            'nickname', $this->user->nickname,
            'developers' => $developers, 
            'start_date' => self::$REPORTING_START_DATE,
            'end_date' => self::$REPORTING_END_DATE
        ]);
    }
}
