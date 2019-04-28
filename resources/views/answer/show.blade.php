@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Answer</div>

                    <div class="card-body">

                        {{$answer->answer}}
                    </div>
                    <div class="card-footer">
                        <span class="float-left">Last Updated: {{ $answer->updated_at->diffForHumans() }} </span>
                        <a class="btn btn-primary float-right"
                           href="{{ route('answer.edit', ['answer'=> $answer->id]) }}">
                            Edit Answer
                        </a>
                        {!! Form::model(null, ['route' => ['answer.delete','answer'=>$answer->id], 'method' => 'delete']) !!}
                        <button class="btn btn-danger float-right" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>

@endsection
