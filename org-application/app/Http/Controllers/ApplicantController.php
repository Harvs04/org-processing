<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\PanelInterview;
use App\Models\User;

class ApplicantController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Fetch groups for the authenticated user
        $group = Group::where('user_id', $user->id)->where('type', 'panel_interview')->get()->first();
        if (isset($group)) {
            $panel_interview = PanelInterview::where('group_id', $group->applicant_group_id)->get()->first();
            $groupmates = User::join('groups', 'users.id', '=', 'groups.user_id')
                ->where('groups.applicant_group_id', $group->applicant_group_id)
                ->where('users.id', '!=', $user->id) // Exclude the current user if needed
                ->select('users.*')
                ->get();
        } else {
            $panel_interview = null;
            $groupmates = null;
        }
        return view('Applicant.panel-interview', [
            'nickname' => $user->nickname, 
            'group' => $group,
            'panel' => $panel_interview,
            'groupmates' => $groupmates
        ]);
    }
}
