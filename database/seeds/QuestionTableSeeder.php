<?php

use App\Question;
use App\User;
use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Question::class, 50)
            ->make()
            ->each(function ($question) {
                $question->user()
                         ->associate(factory(User::class)->create())
                         ->save();
            });
    }
}
