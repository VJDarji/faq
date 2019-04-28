<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller {

    public function show($id) {
        $question = Question::find($id);
        return view('question.show')->with('question', $question);
    }

    public function edit($id) {
        $question = Question::find($id);
        return view('question.edit')->with('question', $question);
    }

    public function update($id, Request $request) {
        $validatedData = $request->validate([
            'question' => 'required|max:255'
        ]);
        $question = Question::find($id);
        if ($question) {
            $question->question = $request->get('question');
            $question->save();
            return redirect(route('questions.show',['question'=>$question->id]));
        }
    }
}
