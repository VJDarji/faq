@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-8">

                <div class="card">
                    {!! Form::model(null, ['route' => ['questions.store'], 'method' => 'post']) !!}
                    <div class="card-header">Question</div>

                    <div class="card-body">
                        <div class="form-group">

                            {!! Form::label('question', 'Question') !!}
                            {!! Form::textarea('question', null,['class' => 'form-control','required' => 'required']) !!}

                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success float-right" value="submit" type="submit" id="submit">Save
                            Question
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
@endsection
