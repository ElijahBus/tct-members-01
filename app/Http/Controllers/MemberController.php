<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveMemberRequest;
use App\Models\Member;
use App\Models\School;
use Illuminate\Http\Request;

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

    public function saveNewMember(SaveMemberRequest $request)
    {

        $validData = $request->validated();

        $member = Member::create([
            'name' => $validData['name'],
            'email' => $validData['email']
        ]);
        $member->schools()->attach($validData['school_ids']);

        return redirect(route('home'));
    }
}
