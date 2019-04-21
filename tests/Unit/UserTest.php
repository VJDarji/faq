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
        $user = factory(User::class)->make();
        $this->assertTrue(is_object($user->questions()->get()));
    }

    public function testAnswers()
    {
        $user = factory(User::class)->make();
        $this->assertTrue(is_object($user->answers()->get()));
    }
    public function testProfile()
    {
        $user = factory(User::class)->make();
        $this->assertTrue(is_object($user->profile()->get()));
    }
}
