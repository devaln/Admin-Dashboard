@extends('layouts.app')

@section('style')
@if ($user->gender === 'Male')
<style>
    #img {
      border: 3px solid #6D94FF;
    }
</style>
@else
<style>
    #img {
      border: 3px solid #F390BD;
    }
</style>
@endif
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h1 class="sub-title"><strong><h4>{{ $title }}</h4></strong></h1>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-trash close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="" align="center">
                        {{-- Avatar --}}
                        <div class="form-item mb-4" align="center">
                            <div class="input-wrapper">
                                <div class="custom-input-file-user">
                                    <div class="input-file-wrapper-user p-3">
                                        <img src="{{ $user->avatar ? $user->avatar : '/assets/images/no-image.jpg' }}"
                                            alt="avatar" id="profileimg"
                                            style="max-width: 160px;max-height: 160px;border-radius: 50%">
                                        <input type="file" onchange="preview()" accept="image/*" id="profimg"
                                            style="display: none" name="avatar"><br>
                                        <b class="text-primary">Profile Image</b>
                                        <p>Click on image to change the profile image.</p>
                                    </div>
                                </div>
                                {!! $errors->first(
                                    'avatar',
                                    '<span class="alert-msg text-danger" aria-hidden="true">
                                    <i class="ti-info-alt-circle" aria-hidden="true"></i> :message</span>',
                                ) !!}
                            </div>
                        </div>

                        {{-- First Name --}}
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-2 col-form-label">First Name :</label>
                            <div class="col-sm-10">
                                <input type="text" id="first_name" value="{{ old('first_name', $user->first_name) }}" name="first_name"
                                    placeholder="First Name" required autofocus class="form-control col-lg-6">
                                {!! $errors->first(
                                    'first_name',
                                    '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                    </i> :message</span>',
                                ) !!}
                            </div>
                        </div>

                        {{-- Middle Name --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">MiddleName :</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('middle_name', $user->middle_name) }}"
                                    class="form-control col-lg-6" placeholder="Middle Name" name="middle_name">
                                {!! $errors->first(
                                    'middle_name',
                                    '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                    </i> :message</span>',
                                ) !!}
                            </div>
                        </div>

                        {{-- Last Name --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Last Name :</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('last_name', $user->last_name) }}"
                                    class="form-control col-lg-6" placeholder="Last Name" name="last_name" required>
                                {!! $errors->first(
                                    'last_name',
                                    '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                    </i> :message</span>',
                                ) !!}
                            </div>
                        </div>

                        {{-- Email Address --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">E-Mail Address :</label>
                            <div class="col-sm-10">
                                <input type="email" value="{{ old('email', $user->email) }}" class="form-control col-lg-6"
                                    name="email" placeholder="Email Address" required>
                                {!! $errors->first(
                                    'email',
                                    '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                    </i> :message</span>',
                                ) !!}
                            </div>
                        </div>

                        {{-- Phone Number --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone Number :</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('phone', $user->phone) }}" class="form-control col-lg-6"
                                    name="phone" placeholder="Phone Number" maxlength="10">
                                {!! $errors->first(
                                    'phone',
                                    '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                    </i> :message</span>',
                                ) !!}
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Password :</label>
                            <div class="col-sm-10">
                                <input type="password" value="{{ old('password', $user->password) }}"
                                    class="form-control col-lg-6" name="password" required>
                                {!! $errors->first(
                                    'password',
                                    '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                    </i> :message</span>',
                                ) !!}
                            </div>
                        </div>

                        {{-- Gender --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gender :</label>
                            <div class="col-sm-10">
                                <input type="radio" value="Male" name="gender" {{ ($user->gender === 'Male')? 'checked' : '' }}>&nbsp; Male &nbsp;
                                <input type="radio" value="Female" name="gender" {{ ($user->gender === 'Female')? 'checked' : '' }}>&nbsp; Female &nbsp;
                                <input type="radio" value="Other" name="gender" {{ ($user->gender === 'Other')? 'checked' : '' }}>&nbsp; Other &nbsp;
                            </div>
                        </div>

                        {{-- date_of_birth  --}}
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-sm-2 col-form-label">Birth Date :</label>
                            <div class="col-sm-10">
                                <input type="date" id="date_of_birth" class="form-control col-lg-6" placeholder="date_of_birth"
                                    value="{{ old('date_of_birth', $user->date_of_birth) }}" name="date_of_birth" required>
                                {!! $errors->first(
                                    'date_of_birth',
                                    '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                    </i> :message</span>',
                                ) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group-btn float-right">
                        <a type="button" href="{{ route('user.dashboard') }}" class="btn btn-mat waves-effect waves-light btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-mat waves-effect waves-light btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3 ml-4" style="width: 100px;height: 389px">
        <div class="card">
            <div class="card-header">
                <h5><strong> Profile </strong></h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-trash close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <div class="content-group text-center">
                    <img id="img" src="{{ $user->avatar ?? asset('assets/images/no-image.jpg') }}" alt="avatar.jpg" width="100px" height="100px" style="border-radius: 75%;"><br>
                    <p>Profile Image</p>
                </div>
                <div class="content-group">
                    <ul>
                        @if ($user->first_name && $user->last_name)
                        <li>
                            <i class="icofont icofont-bubble-right"></i> <i class="ti-user"> {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</i>
                        </li>
                        @endif

                        @if ($user->email)
                        <li>
                            <i class="icofont icofont-bubble-right"></i> <a href="mailto:{{ $user->email }}"><i class="ti-email"> {{ $user->email }} </i></a>
                        </li>
                        @endif

                        @if ($user->phone)
                        <li>
                            <i class="icofont icofont-bubble-right"></i> <a href="tel:{{ $user->phone }}"><i class="ti-mobile"> {{ $user->phone }} </i></a>
                        </li>
                        @endif

                        @if ($user->date_of_birth)
                        <li>
                            <i class="icofont icofont-bubble-right"></i> <i class="ti-calendar"> {{ $user->date_of_birth }} </i>
                        </li>
                        @endif

                        @if ($user->gender)
                        <li>
                            <i class="icofont icofont-bubble-right"></i> <i class="ti-tag"> {{ $user->gender }} </i>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('#profileimg').click(function() {
            $('#profimg').click();
        });

        function preview() {
            profileimg.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
