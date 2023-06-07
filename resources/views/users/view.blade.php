@extends('layouts.app')
@section('content')
    <div class="card">
        <a href="{{ route('users.index') }}" class="btn btn-inverse waves-light waves-effect col-sm-1 float-right"><i class="la la-arrow-circle-o-left"><span>
            Back</span></i></a>
        <div class="card-header">
            <h5 class="card-title float-left">View Users</h5>
            <div class="card-header-right">
                <div class="dropdown-primary dropdown open">
                    <button class="btn btn-dark dropdown-toggle waves-effect waves-light" type="button" id="dropdown-6"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Danger</button>
                    <div class="dropdown-menu" aria-labelledby="dropdown-6" data-dropdown-in="fadeIn"
                        data-dropdown-out="fadeOut">
                            <a class="dropdown-item waves-light waves-effect" href="{{ route('users.create') }}">Create User</a>
                            <a class="dropdown-item waves-light waves-effect" href="{{ route('users.show', $user->id) }}">View User</a>
                            <a class="dropdown-item waves-light waves-effect" href="{{ route('users.edit', $user->id) }}">Edit User</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-lg-6 striped">
                    @if ($user->first_name)
                        <div class="row p-2">
                            <div class="col-md-4">
                                <strong>{{ trans('Full Name') }}</strong>
                            </div>
                            <div class="col-md-6">
                                <a>{{ $user->first_name }} {{ $user->middle_name }}
                                    {{ $user->last_name }}</a>
                            </div>
                        </div>
                    @endif

                    @if ($user->email)
                        <div class="row p-2">
                            <div class="col-md-4">
                                <strong>{{ trans('E-mail Address') }}</strong>
                            </div>
                            <div class="col-md-6">
                                <a>{{ $user->email }}</a>
                            </div>
                        </div>
                    @endif

                    @if ($user->phone)
                        <div class="row p-2">
                            <div class="col-md-4">
                                <strong>{{ trans('Phone Number') }}</strong>
                            </div>
                            <div class="col-md-6">
                                <a>{{ $user->phone }}</a>
                            </div>
                        </div>
                    @endif

                    @if ($user->gender)
                        <div class="row p-2">
                            <div class="col-md-4">
                                <strong>{{ trans('Gender') }}</strong>
                            </div>
                            <div class="col-md-6">
                                <a>{{ $user->gender }}</a>
                            </div>
                        </div>
                    @endif

                    @if ($user->date_of_birth)
                        <div class="row p-2">
                            <div class="col-md-4">
                                <strong>{{ trans('Date Of Birth') }}</strong>
                            </div>
                            <div class="col-md-6">
                                <a>{{ $user->date_of_birth }}</a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <img src="{{ $user->avatar ?? asset('assets/images/no-image.jpg') }}" alt="avatar" width="200px"
                        height="200x" class="img-radius">
                </div>
            </div>
        </div>
    </div>
@endsection
