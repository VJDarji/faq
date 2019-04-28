@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-8">

                <div class="card">
                    {!! Form::model($answer, ['route' => ['answer.update','answer'=>$answer->id], 'method' => 'patch']) !!}
                    <div class="card-header">Answer</div>

                    <div class="card-body">
                        <div class="form-group">

                            {!! Form::label('answer', 'Answer') !!}
                            {!! Form::textarea('answer', $answer->answer,['class' => 'form-control','required' => 'required']) !!}

                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="float-left">Last Updated: {{ $answer->updated_at->diffForHumans() }} </span>
                        <button class="btn btn-success float-right" value="submit" type="submit" id="submit">Update Answer
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
@endsection
