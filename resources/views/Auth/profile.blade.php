@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="sub-title">Edit Profile</h1>
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
                        <label class="col-sm-2 col-form-label">Middle Name :</label>
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
                            <input type="radio" value="Male" name="gender">&nbsp; Male &nbsp;
                            <input type="radio" value="Female" name="gender">&nbsp; Female &nbsp;
                            <input type="radio" value="Other" name="gender">&nbsp; Other &nbsp;
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
