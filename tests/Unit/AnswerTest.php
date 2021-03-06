<?php

namespace Tests\Unit;

use App\Answer;
use App\Question;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnswerTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSave() {
        $user = $user = factory(User::class)->create();
        $question = factory(Question::class)->make();
        $question->user()
                 ->associate($user);
        $question->save();
        $answer = factory(Answer::class)->make();
        $answer->user()
               ->associate($user);
        $answer->question()
               ->associate($question);
        $this->assertTrue($answer->save());
    }
}
