@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Questions
                        <a class="btn btn-success float-right" href="{{ route('questions.create')}}">
                            Add Question
                        </a></div>

                    <div class="card-body">

                        <div class="card-deck">
                            @forelse($questions as $question)
                                <div class="col-sm-4 d-flex align-items-stretch">
                                    <div class="card mb-3 ">
                                        <div class="card-header">
                                            <small class="text-muted">
                                                Last Updated: {{ $question->updated_at->diffForHumans() }}
                                                Number of Answers: {{ $question->answers()->count() }}
                                            </small>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{$question->question}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <p class="card-text">
                                                @if($question->votes()->count() <1)
                                                    <a class="btn btn-danger float-left"
                                                       href="{{ route('question.vote', ['question'=>$question->id,'value' => 1]) }}">
                                                        Dislike
                                                    </a>
                                                    <a class="btn btn-success float-left"
                                                       href="{{ route('question.vote', ['question'=>$question->id,'value' => 0]) }}">
                                                        Like
                                                    </a>
                                                @else
                                                    <span>Already voted</span>
                                                @endif
                                                <a class="btn btn-primary float-right"
                                                   href="{{ route('questions.show', ['id' => $question->id]) }}">
                                                    View
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="card">

                                    <div class="card-body"> No Question created yet</div>
                                </div>
                            @endforelse
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            {{ $questions->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
