@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Profile</div>

                    @if($profile)
                        <div class="card-body ">
                            <span class="font-weight-bold">First Name:</span> {{$profile->firstName}}</br>
                            <span class="font-weight-bold">Last Name: </span>{{$profile->lastName }}</br>
                            <span class="font-weight-bold">Body: </span>{{$profile->bio}}</br>
                        </div>
                        <div class="card-footer">

                            <a class="btn btn-success float-right"
                               href="{{ route('profile.form') }}">
                                Edit
                            </a>
                        </div>
                    @else
                        <div class="card-body">
                        <span>Ops you haven't setup your profile yet</span>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-success float-right" href="{{ route('profile.form') }}">
                                Create
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
