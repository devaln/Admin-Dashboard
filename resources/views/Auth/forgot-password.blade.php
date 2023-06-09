@extends('layouts.guest')
@section('content')
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->


                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
            </div>
        </div>
    </div>

    <form class="md-float-material form-material" action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="auth-box card">
            <div class="card-header">
                <h5>Forgot Password</h5>
            </div>
            <div class="card-block">
                <div class="row m-b-20">
                    <div class="col-md-12">
                        <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
                    </div>
                </div>

                {{-- Email --}}
                <div class="form-group form-primary">
                    <input type="text" name="email" class="form-control" required="" autofocus>
                    {!! $errors->first('email', '<span class="alert-msg text-danger" aria-hidden="true">
                        <i class="ti-info-alt-circle" aria-hidden="true"></i> :message</span>', ) !!}
                    <span class="form-bar"></span>
                    <label class="float-label">Your Email Address</label>
                </div>

                <div class="row m-t-30">
                    <div class="col-md-12">
                        <button type="submit"
                            class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">
                            Email Password Reset Link
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
