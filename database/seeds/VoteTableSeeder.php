<?php

use App\Question;
use App\Vote;
use Illuminate\Database\Seeder;

class VoteTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $questions = Question::all();
        foreach ($questions as $question) {
            $vote = factory(Vote::class)->make();
            $vote->user()
                 ->associate($question->user);
            $vote->question()->associate($question);
            $vote->save();
        }
    }
}
