<?php

namespace App\Http\Controllers;

use App\Models\School;

class MemberController extends Controller
{
    const PAGINATION_LENGTH = 6;

    public function showMembersBySchool(School $school)
    {
        $members = $school->members()->paginate(self::PAGINATION_LENGTH);

        return view('welcome')->with([
            'members' => $members,
            'hasSelection' => true,
            'selectedSchoolId' => $school?->id,
            'selectedSchool' => $school?->name
        ]);
    }
}
