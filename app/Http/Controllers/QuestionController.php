<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller {

    public function create() {
        return view('question.create');
    }

    public function store(Request $request) {
        $this->validateQuestionFormt($request);
        $question = new Question();
        $question->question = $request->get('question');
        Auth::user()
            ->questions()
            ->save($question);
        return redirect(route('home'));
    }

    public function show($id) {
        $question = Question::find($id);
        return view('question.show')->with('question', $question);
    }

    public function edit($id) {
        $question = Question::find($id);
        return view('question.edit')->with('question', $question);
    }

    public function update($id, Request $request) {
        $this->validateQuestionFormt($request);
        $question = Question::find($id);
        if ($question) {
            $question->question = $request->get('question');
            $question->save();
            return redirect(route('questions.show', ['question' => $question->id]));
        }
    }

    private function validateQuestionFormt(Request $request) {
        return $validatedData = $request->validate([
            'question' => 'required|max:255'
        ]);
    }
}
