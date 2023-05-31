@extends('layout.app')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">All Accounts</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a>Settings</a>
                            </li>
                            <li class="breadcrumb-item active">All users
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="media width-250 float-right">
                    <media-left class="media-middle">
                        <div id="sp-bar-total-sales"></div>
                    </media-left>
                    <div class="media-body media-right text-right">
                        <div class="btn-group mr-1 mb-1">
                            <a href="{{ route('users.index') }}" class="btn btn-dark"><i class="la la-arrow-circle-o-left"><span> Back</span></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Base style table -->
            <section id="base-style">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title float-left">View Users</h4>
                                <div class="heading-elements">
                                    <div class="media-body media-right text-right">
                                        <div class="btn-group mr-1 mb-1">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="la la-ellipsis-v"> Action</i>
                                            </button>
                                            <div class="dropdown-menu arrow">
                                                <a class="btn form-control" href="{{ route('users.create') }}"><i class="la la-plus primary font-medium-1 mr-1"> Add User</i></a>
                                                <a class="btn form-control" href="{{ route('users.edit', $user->id) }}"><i class="la la-pencil success font-medium-1 mr-1"> Edit User</i></a>
                                                <div class="dropdown-divider"></div>
                                                <a class="btn form-control" onclick="return confirm('Do you really want to delete this users!')" href="{{ route('users.destroy', $user->id) }}"><i class="la la-trash danger font-medium-1 mr-1"> Delete User</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-content collapse show">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="p-5">
                                            <img src="{{ $user->avatar }}" alt="avatar" style="width: 326px">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 striped p-2">
                                        <div class="card-body">
                                            @if ($user->first_name)
                                            <div class="row p-2">
                                                <div class="col-md-4">
                                                    <strong>{{ trans('Full Name') }}</strong>
                                                </div>
                                                <div class="col-md-6">
                                                    <a>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</a>
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

                                            @if ($user->pan_card_number)
                                            <div class="row p-2">
                                                <div class="col-md-4">
                                                    <strong>{{ trans('Pan Card Number') }}</strong>
                                                </div>
                                                <div class="col-md-6">
                                                    <a>{{ $user->pan_card_number }}</a>
                                                </div>
                                            </div>
                                            @endif

                                            @if ($user->adhaar_card_number)
                                            <div class="row p-2">
                                                <div class="col-md-4">
                                                    <strong>{{ trans('Adhaar Card Number') }}</strong>
                                                </div>
                                                <div class="col-md-6">
                                                    <a>{{ $user->adhaar_card_number }}</a>
                                                </div>
                                            </div>
                                            @endif

                                            @if ($user->maritial_status)
                                            <div class="row p-2">
                                                <div class="col-md-4">
                                                    <strong>{{ trans('Maritial Status') }}</strong>
                                                </div>
                                                <div class="col-md-6">
                                                    <a>{{ $user->maritial_status }}</a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
