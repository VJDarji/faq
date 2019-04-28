@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-8">

                <div class="card">
                    {!! Form::model($question, ['route' => ['questions.update','question'=>$question->id], 'method' => 'patch']) !!}
                    <div class="card-header">Question</div>

                    <div class="card-body">
                        <div class="form-group">

                            {!! Form::label('uestion', 'First Name') !!}
                            {!! Form::textarea('question', $question->question,['class' => 'form-control','required' => 'required']) !!}

                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="float-left">Last Updated: {{ $question->updated_at->diffForHumans() }} </span>
                        <button class="btn btn-success float-right" value="submit" type="submit" id="submit">Update Question
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
@endsection
