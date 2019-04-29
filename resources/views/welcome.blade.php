@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Questions
                        <div class="float-right">
                            {!! Form::model(null, ['route' => ['main.sort'], 'method' => 'post']) !!}
                            {!! Form::select('sort',['Latest','Oldest','Most liked','Most Disliked'],'latest') !!}
                            <button class="btn btn-sm btn-danger float-right" value="submit" type="submit" id="submit">
                                Apply
                            </button>
                            {!! Form::close() !!}
                        </div>
                        @auth
                            <div class="float-right">
                            <a class="btn btn-success" href="{{ route('questions.create')}}">
                                Add Question
                            </a>
                            </div>

                            </div>
                    @endauth

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
                                                @auth
                                                    @empty($question->votes()->where('user_id','=',auth()->user()->id)->first())
                                                        <a class="btn btn-danger float-left"
                                                           href="{{ route('question.vote', ['question'=>$question->id,'value' => 0]) }}">
                                                            Dislike
                                                        </a>
                                                        <a class="btn btn-success float-left"
                                                           href="{{ route('question.vote', ['question'=>$question->id,'value' => 1]) }}">
                                                            Like
                                                        </a>
                                                    @elseif($question->votes()->where('user_id','=',auth()->user()->id)->first())
                                                        You have already {{$question->votes()->first()->vote}}
                                                    @endempty
                                                    <a class="btn btn-primary float-right"
                                                       href="{{ route('questions.show', ['id' => $question->id]) }}">
                                                        View
                                                    </a>
                                                @else
                                                    <span>Login in to vote</span>
                                                @endauth
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
