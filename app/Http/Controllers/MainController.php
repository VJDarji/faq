<?php

namespace App\Http\Controllers;

use App\Question;
use App\Vote;
use Illuminate\Http\Request;

class MainController extends Controller {
    public function index() {
        $questions = Question::latest()
                             ->paginate(6);
        return view('welcome')->with('questions', $questions ?? null);
    }

    public function sort(Request $request) {
        $questions = null;
        switch ($request->get('sort')) {
            case 0:
                $questions = Question::latest()
                                     ->paginate(6);
                break;
            case 1:
                $questions = Question::oldest()
                                     ->paginate(6);
                break;
            case 2:
                $questions = Question::withCount([
                    'votes' => function ($query) {
                        $query->where('vote', '=', 1);
                    }
                ])->orderBy('votes_count', 'desc')->paginate(10);
                break;
            case 3:
                $questions = Question::withCount([
                    'votes' => function ($query) {
                        $query->where('vote', '=', 0);
                    }
                ])->orderBy('votes_count', 'desc')->paginate(10);
                break;
        }
        return view('welcome')->with('questions', $questions ?? null);
    }
}
