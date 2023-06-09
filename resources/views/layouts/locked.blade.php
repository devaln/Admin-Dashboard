{{-- @extends('layouts.guest')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ App\Models\Setting::setting()->logo }}" alt="SiteLogo" width="200px" height="125px">
                            <p><strong><i class="icofont icofont-bubble-right"> ACCOUNT LOCKED </i> <i class="icofont icofont-bubble-right"></i></strong></p>
                        </div>
                        <form method="POST" action="{{ route('') }}" aria-label="{{ __('Locked') }}" class="md-float-material form-material">
                            <div class="auth-box card">
                                <div class="text-center p-5">
                                    <img src="{{ Auth::user()->avatar ?? asset('assets/images/no-image.jpg') }}" alt="Avatar" width="100px" height="100px" class="image-fulid" style="border-radius: 75%">
                                    <div class="full-name">
                                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                    </div>
                                </div>
                                @csrf
                                <div class="form-group form-primary ml-5 mr-5">
                                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                    {!! $errors->first('password', '<span class="alert-msg text-danger" aria-hidden="true">
                                        <i class="ti-info-alt-circle" aria-hidden="true"></i> :message</span>', ) !!}
                                </div>

                                <div class="form-group-btn p-5" align="center">
                                    <button type="submit" class="btn btn-mat waves-effect waves-light btn-primary btn-block">
                                        {{ __('Unlock') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@extends('layouts.guest')
@section('content')
<!-- Container-fluid starts -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <!-- Authentication card start -->

            <form class="md-float-material form-material" action="{{ route('locked.check') }}"
            method="POST">
            @csrf
            <div class="text-center">
                {{-- <img src="{{ App\Models\Setting::setting()->logo }}" alt="logo.png"> --}}
                <img src="{{ App\Models\Setting::setting()->logo }}" alt="SiteLogo" width="100px" height="75px">
                <p class="text-white"><strong><i class="icofont icofont-bubble-right"> ACCOUNT LOCKED </i> <i class="icofont icofont-bubble-right"></i></strong></p>
            </div>
                <div class="auth-box card">
                    <div class="card-block">
                        {{-- <div class="row m-b-20">
                            <div class="col-md-12">
                                <h3 class="text-center">Sign In</h3>
                            </div>
                        </div> --}}
                        <div class="text-center p-5">
                            <img src="{{ Auth::user()->avatar ?? asset('assets/images/no-image.jpg') }}" alt="Avatar" width="100px" height="100px" class="image-fulid" style="border-radius: 75%">
                            <div class="full-name">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </div>
                        </div>

                        <div class="form-group form-primary ml-5 mr-5">
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Password</label>
                            {!! $errors->first('password', '<span class="alert-msg text-danger" aria-hidden="true">
                                <i class="ti-info-alt-circle" aria-hidden="true"></i> :message</span>', ) !!}
                        </div>

                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <button type="submit"
                                class="btn btn-primary btn-md btn-block waves-effect waves-dark text-center m-b-20">UnLock</button>
                            </div>
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
