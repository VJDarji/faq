<?php

use App\Answer;
use App\Question;
use App\User;
use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Answer::class, 50)
            ->make()
            ->each(function ($answer) {
                $user = factory(User::class)->create();
                $question = factory(Question::class)->make();
                $question->user()
                         ->associate($user);
                $question->save();
                $answer->user()
                       ->associate($user);
                $answer->question()
                       ->associate($question);
                $answer->save();
            });
    }
}
