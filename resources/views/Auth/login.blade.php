@extends('layouts.guest')
@section('content')
<!-- Container-fluid starts -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <!-- Authentication card start -->

            <form class="md-float-material form-material" action="{{ route('login') }}"
            method="POST">
            @csrf
            <div class="text-center">
                <img src="assets/images/logo.png" alt="logo.png">
                </div>{{--  --}}
                <div class="auth-box card">
                    <div class="card-block">
                        <div class="row m-b-20">
                            <div class="col-md-12">
                                <h3 class="text-center">Sign In</h3>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="form-group form-primary">
                            <input type="text" name="email" class="form-control" required="" autofocus>
                            <span class="form-bar"></span>
                            <label class="float-label">Your Email Address</label>
                            {!! $errors->first(
                                'email',
                                '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                </i> :message</span>',
                            ) !!}
                        </div>

                        {{-- Password --}}
                        <div class="form-group form-primary">
                            <input type="password" name="password" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Password</label>
                            {!! $errors->first(
                                'password',
                                '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                </i> :message</span>',
                            ) !!}
                        </div>
                        <div class="row m-t-25 text-left">
                            <div class="col-12">
                                <div class="checkbox-fade fade-in-primary d-">
                                    <label>
                                        <input type="checkbox" value="">
                                        <span class="cr"><i
                                            class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        <span class="text-inverse">Remember me</span>
                                    </label>
                                </div>
                                <div class="forgot-phone text-right f-right">
                                    <a href="{{ route('password.request') }}" class="text-right f-w-600"> Forgot Password?</a>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <button type="submit"
                                class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign
                                in</button>
                            </div>
                        </div>
                        <hr />
                        <div class="text">
                            came first time on this site? <a href="{{ route('register') }}"
                            class="text-primary">Sign-Up</a>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end of form -->
        </div>
        <!-- end of col-sm-12 -->
    </div>
    <!-- end of row -->
</div>
<!-- end of container-fluid -->
@endsection
