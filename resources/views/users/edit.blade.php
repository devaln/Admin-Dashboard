@extends('layouts.app')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-card-center">{{ $title }}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form class="form" action="{{ $action }}" method="POST">
                            @csrf
                            @isset($user->id)
                            {{ method_field('PATCH')}}
                            @endisset
                            <div class="form-body">
                                {{-- Name --}}
                                <div class="row p-2">
                                    {{-- Last Name --}}
                                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                        <label for="last_name" class="col-form-label text-md-end">Last Name </label>
                                        <input type="text" id="last_name" class="form-control" placeholder="Last Name"
                                            value="{{ old('last_name', $user->last_name) }}" name="last_name" required autofocus>
                                        {!! $errors->first('last_name', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
                                    </div>
                                    {{-- First Name --}}
                                    <div class="form-group">
                                        <label for="eventRegInput1" class="col-form-label text-md-end">First Name </label>
                                        <input type="text" id="eventRegInput1" class="form-control" placeholder="First Name"
                                            value="{{ old('first_name', $user->first_name) }}" name="first_name" required>
                                    </div>
                                    {{-- Middle Name --}}
                                    <div class="form-group">
                                        <label for="middle_name" class="col-form-label text-md-end">Middle Name </label>
                                        <input type="text" id="middle_name" class="form-control" placeholder="Middle Name"
                                            value="{{ old('middle_name', $user->middle_name) }}" name="middle_name" required>
                                    </div>
                                </div>
                                {{-- Email Address --}}
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" class="form-control" placeholder="Email Address"
                                        value="{{ old('email', $user->email) }}" name="email" required>
                                </div>
                                {{-- Phone Number --}}
                                <div class="form-group">
                                    <label for="phone">Phone Number </label>
                                    <input type="text" id="phone" class="form-control" placeholder="Phone Number"
                                        value="{{ old('phone', $user->phone) }}" name="phone" required>
                                </div>
                                {{-- Password --}}
                                <div class="form-group">
                                    <label for="Password" >Password</label>
                                    <input type="Password" id="Password" class="form-control" placeholder="Password"
                                        value="{{ old('Password') }}" name="password" required>
                                </div>
                                {{-- Confirmed Password --}}
                                <div class="form-group">
                                    <label for="Password-confirm">Confirm Password</label>
                                    <input type="Password" id="Password-confirm" class="form-control" placeholder="Confirm Password"
                                        value="{{ old('Password') }}" name="password_confirmation" required>
                                </div>
                                {{-- avatar  --}}
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>&nbsp;&nbsp;
                                    @if (!is_null($user->avatar))
                                        <img src="{{ $user->avatar }}" alt="" id="avatar" style="width: 10%">
                                    @endif
                                    <input type="file" id="avatar" class="form-control" placeholder="avatar"
                                        value="{{ old('avatar') }}" name="avatar">
                                </div>
                                {{-- date_of_birth  --}}
                                <div class="form-group">
                                    <label for="date_of_birth">date_of_birth</label>
                                    <input type="date" id="date_of_birth" class="form-control" placeholder="date_of_birth"
                                        value="{{ old('date_of_birth', $user->date_of_birth) }}" name="date_of_birth" required>
                                </div>
                                {{-- gender  --}}
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <div class="input-group">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="gender" value="{{ $user->gender}}" class="custom-control-input" {{ ($user->gender == 'Male')? 'checked': '' }} id="Male">
                                            <label class="custom-control-label" for="Male">Male</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="gender" value="{{ $user->gender }}" class="custom-control-input" {{ ($user->gender == 'Female')? 'checked': '' }} id="Female">
                                            <label class="custom-control-label" for="Female">Female</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio">
                                            <input type="radio" name="gender" value="{{ $user->gender }}" class="custom-control-input" {{ ($user->gender == 'Other')? 'checked': '' }} id="Other">
                                            <label class="custom-control-label" for="Other">Other</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- Pan Card Number  --}}
                                <div class="form-group">
                                    <label for="pan_card_number">Pan Card Number</label>
                                    <input type="text" id="pan_card_number" class="form-control" placeholder="Pan Card Number"
                                        value="{{ old('pan_card_number', $user->pan_card_number) }}" name="pan_card_number" required>
                                </div>
                                </div>
                                {{-- Adhaar Card Number  --}}
                                <div class="form-group">
                                    <label for="adhaar_card_number">Adhaar Card Number</label>
                                    <input type="text" id="adhaar_card_number" class="form-control" placeholder="Adhaar Card Number"
                                        value="{{ old('adhaar_card_number', $user->adhaar_card_number) }}" name="adhaar_card_number" required>
                                </div>
                                {{-- maritial_status  --}}
                                <div class="form-group">
                                    <label for="maritial_status">maritial_status</label>
                                    <div class="input-group">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="maritial_status" value="{{ $user->maritial_status}}" class="custom-control-input" {{ ($user->maritial_status == 'Marrired')? 'checked': '' }} id="Marrired">
                                            <label class="custom-control-label" for="Marrired">Marrired</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="maritial_status" value="{{ $user->maritial_status }}" class="custom-control-input" {{ ($user->maritial_status == 'Unmarried')? 'checked': '' }} id="Unmarried">
                                            <label class="custom-control-label" for="Unmarried">Unmarried</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio">
                                            <input type="radio" name="maritial_status" value="{{ $user->maritial_status }}" class="custom-control-input" {{ ($user->maritial_status == 'Divorced')? 'checked': '' }} id="Divorced">
                                            <label class="custom-control-label" for="Divorced">Divorced</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- is_admin  --}}
                                <div class="form-group" align="center">
                                    <input type="checkbox" id="is_admin"
                                        value="{{ $user->is_admin }}" name="is_admin" >
                                    <label for="is_admin">Admin User</label>
                                </div>
                                {{-- accountable  --}}
                                <div class="form-group" align="center">
                                    <input type="checkbox" id="accountable"
                                    value="{{ old('accountable', $user->accountable) }}" name="accountable" >
                                    <label for="accountable">This User is for an Employee</label>
                                </div>
                            </div>

                            <div class="form-actions center">
                                <a type="button" href="{{ route('users.index') }}" class="btn btn-danger mr-1">
                                    <i class="ft-x"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
