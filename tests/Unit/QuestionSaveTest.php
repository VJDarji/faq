<?php

namespace Tests\Unit;

use App\Question;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionSaveTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testQuestionSave() {
        $user = factory(User::class)->create();
        $question = factory(Question::class)->make();
        $question->user()
                 ->associate($user);
        $this->assertTrue($question->save());
    }
}
