@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Question</div>

                    <div class="card-body">

                        {{$question->question}}
                    </div>
                    <div class="card-footer">
                        <span class="float-left">Last Updated: {{ $question->updated_at->diffForHumans() }} </span>
                        <a class="btn btn-primary float-right"
                           href="{{ route('questions.edit', ['question'=> $question->id]) }}">
                            Edit Question
                        </a>


                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><a class="btn btn-primary float-left"
                                                href="{{route('answer.create',['question'=>$question->id])}}">
                            Answer Question
                        </a></div>

                    <div class="card-body">
                        @forelse($question->answers as $answer)
                            <div class="card">
                                <div class="card-body">{{$answer->answer}}</div>
                                <div class="card-footer">
                                    <span class="float-left">{{$answer->created_at->diffForHumans()}}</span>
                                    <a class="btn btn-primary float-right"
                                       href="{{route('answer.show',['question'=>$answer->id])}}">
                                        View
                                    </a>

                                </div>
                            </div>
                        @empty
                            <div class="card">

                                <div class="card-body"> No Answers</div>
                            </div>
                        @endforelse


                    </div>
                </div>
            </div>
@endsection
