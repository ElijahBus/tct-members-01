<?php

namespace Tests\Feature;

use App\Models\Member;
use App\Models\School;
use Database\Utilities\EnableTruncate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use EnableTruncate, RefreshDatabase;

    public function test_user_can_see_the_members_and_schools_on_welcome_page()
    {
        $this->enableTruncate()
            ->truncate(['schools', 'members', 'member_school'])
            ->disableTruncate();

        School::factory(1)->create(['name' => 'TCT college']);

        Member::factory(1)->create(['name' => 'Elie']);

        Member::find(1)->schools()->attach(1); // 1 => 1 Ids of member, school

        $response = $this->get(route('home'));
        $response->assertStatus(200);
        $response->assertSee('TCT college');
        $response->assertSee('Elie');
    }
}
