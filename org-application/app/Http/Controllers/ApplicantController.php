<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;

class ApplicantController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Fetch groups for the authenticated user
        $groups = Group::where('user_id', $user->id);

        return view('Applicant.panel-interview', ['groups' => $groups]);
    }
}
