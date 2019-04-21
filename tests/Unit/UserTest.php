<?php

namespace Tests\Unit;

use App\Question;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserSave() {
        $user = factory(User::class)->make();
        $this->assertTrue($user->save());
    }

    public function testUserQuestions() {
        $user = factory(\App\User::class)->make();
        $this->assertTrue(is_object($user->questions()->get()));
    }
}
