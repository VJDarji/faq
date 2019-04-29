<?php

namespace App\Http\Controllers;

use App\Question;
use App\Vote;
use Auth;
use Illuminate\Http\Request;

class VoteController extends Controller {
    public function vote($question,$value) {
        $question = Question::find($question);
        $vote = new Vote();
        $vote->vote = $value;
        $vote->user()
             ->associate(Auth::user());
        $vote->question()
             ->associate($question);
        $vote->save();
        return redirect(route('home'));
    }
}
