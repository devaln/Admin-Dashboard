@extends('layouts.guest')
@section('content')
    <form class="md-float-material form-material" action="{{ route('password.store') }}" method="POST">
        @csrf
        <div class="auth-box card">
            <div class="card-header">
                <h5>Reset Password</h5>
            </div>
            <div class="card-block">

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                {{-- Email --}}
                <div class="form-group form-primary">
                    <input type="text" name="email" value="{{ old('email', $request->email) }}" class="form-control"
                        required autofocus>
                    {!! $errors->first(
                        'email',
                        '<span class="alert-msg text-danger" aria-hidden="true">
                                                                <i class="ti-info-alt-circle" aria-hidden="true"></i> :message</span>',
                    ) !!}
                    <span class="form-bar"></span>
                    <label class="float-label">Your Email Address</label>
                </div>

                {{-- Reset Password --}}
                <div class="form-group form-primary">
                    <input type="password" name="password" class="form-control" required>
                    {!! $errors->first(
                        'password',
                        '<span class="alert-msg text-danger" aria-hidden="true">
                                                                <i class="ti-info-alt-circle" aria-hidden="true"></i> :message</span>',
                    ) !!}
                    <span class="form-bar"></span>
                    <label class="float-label">Password</label>
                </div>

                {{-- Reset Password --}}
                <div class="form-group form-primary">
                    <input type="password" name="password_confirmation" class="form-control" required>
                    {!! $errors->first(
                        'password_confirmation',
                        '<span class="alert-msg text-danger" aria-hidden="true">
                                                                <i class="ti-info-alt-circle" aria-hidden="true"></i> :message </span>',
                    ) !!}
                    <span class="form-bar"></span>
                    <label class="float-label">Confirm Password</label>
                </div>

                <div class="row m-t-30">
                    <div class="col-md-12">
                        <button type="submit"
                            class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">
                            Reset Password
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
