<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Member;
use App\Models\School;
use Database\Utilities\EnableTruncate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use EnableTruncate;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->enableTruncate()
            ->truncate(['schools', 'members', 'member_school'])
            ->disableTruncate();

        School::factory(3)->create();

        Member::factory(10)->create();

        Member::all()->collect()->each(function ($member) {
            if ($member->id < 4)
                $member->schools()->attach(1);

            if ($member->id >= 4 && $member->id < 8)
                $member->schools()->attach([1,2]);

            if ($member->id >= 8)
                $member->schools()->attach([1,2,3]);

        });
    }
}
