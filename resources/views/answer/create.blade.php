@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Question</div>

                    <div class="card-body">
                        <div class="form-group">
                            <span class="font-weight-bold">Question:</span> {{$question->question}}</br>
                        </div>

                    </div>
                    <div class="card-footer">
                        <span class="float-left">Last Updated: {{ $question->updated_at->diffForHumans() }} </span>
                    </div>

                    {!! Form::model(null, ['route' => ['answer.create','question'=>$question->id], 'method' => 'post']) !!}
                    <div class="card-body">
                        <div class="form-group">

                            {!! Form::label('answer', 'Answer') !!}
                            {!! Form::textarea('answer', null,['class' => 'form-control','required' => 'required']) !!}

                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success float-right" value="submit" type="submit" id="submit">Save
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>


            </div>
@endsection
