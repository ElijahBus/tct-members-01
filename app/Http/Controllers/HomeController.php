<?php

namespace App\Http\Controllers;

use App\Models\Member;

class HomeController extends Controller
{
    const PAGINATION_LENGTH = 5;

    public function index()
    {
        $members = Member::with('schools')->paginate(self::PAGINATION_LENGTH);

        return view('welcome')->with([
            'members' => $members
        ]);
    }
}
