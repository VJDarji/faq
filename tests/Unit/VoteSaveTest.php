<?php

namespace Tests\Unit;

use App\Question;
use App\User;
use App\Vote;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoteSaveTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testVoteSave()
    {
        $user = factory(User::class)->create();
        $question = factory(Question::class)->make();
        $question->user()
                 ->associate($user)->save();
        $vote=factory(Vote::class)->make();
        $vote->user()
             ->associate($user);
        $vote->question()
             ->associate($question);
        $this->assertTrue($vote->save());
    }
}
