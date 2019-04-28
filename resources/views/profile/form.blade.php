@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Profile</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @if(auth()->user()->profile)
                            {!! Form::model(auth()->user()->profile, ['route' => ['profile.edit'], 'method' => 'patch']) !!}
                        @else()
                            {!! Form::model(null, ['route' => ['profile.create'], 'method' => 'post']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('firstName', 'First Name') !!}
                            {!! Form::text('firstName', auth()->user()->profile->firstName?? null,['class' => 'form-control','required' => 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lastName', 'Last Name') !!}
                            {!! Form::text('lastName', auth()->user()->profile->lastName?? null,['class' => 'form-control','required' => 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('bio', 'Bio') !!}
                            {!! Form::text('bio',  auth()->user()->profile->bio?? null,['class' => 'form-control','required' => 'required']) !!}
                        </div>
                        <button class="btn btn-success float-right" value="submit" type="submit" id="submit">Save
                        </button>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
