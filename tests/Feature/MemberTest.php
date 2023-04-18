<?php

namespace Tests\Feature;

use Database\Utilities\EnableTruncate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MemberTest extends TestCase
{
    use EnableTruncate, RefreshDatabase;

    public function test_member_can_be_saved()
    {
        $this->enableTruncate();

        $this->post(route('members.save'), [
            'name' => 'Elie',
            'email' => 'elie@tct.com',
            'school_ids' => [1]
        ]);

        $this->assertDatabaseHas('members', ['name' => 'Elie']);
        $this->assertDatabaseHas('member_school', ['school_id' => 1]);
    }

    public function test_member_cannot_be_saved_when_passing_invalid_data()
    {
        $this->enableTruncate();

        $this->post(route('members.save'), [
            'name' => 'Elie',
            'email' => 'not_an_email',
            'school_ids' => null
        ]);

        $this->assertDatabaseCount('members', 0);
    }
}
