<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller {

    public function create($id) {
        $question = Question::find($id);
        return view('answer.create')->with('question', $question);
    }

    public function store($id, Request $request) {
        $this->validateAnswerForm($request);
        $question = Question::find($id);
        $user = Auth::user();
        $answer = new Answer();
        $answer->answer = $request->get('answer');
        $answer->user()
               ->associate($user);
        $answer->question()
               ->associate($question);
        $answer->save();
        return redirect(route('questions.show', ['question' => $question->id]));
    }

    public function show($id) {
        $answer = Answer::find($id);
        return view('answer.show')->with('answer', $answer);
    }

    public function edit($id) {
        $answer = Answer::find($id);
        return view('answer.edit')->with('answer', $answer);
    }

    public function update($id,Request $request) {
        $this->validateAnswerForm($request);
        $answer = Answer::find($id);
        $answer->answer = $request->get('answer');
        $answer->save();
        return view('answer.show')->with('answer', $answer);
    }

    /***
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete($id) {
        $answer = Answer::find($id);
        $answer->delete();
        return redirect(route('questions.show', ['question' => $answer->question_id]));
    }

    private function validateAnswerForm(Request $request) {
        return $request->validate([
            'answer' => 'required|max:255',
        ]);
    }


}
