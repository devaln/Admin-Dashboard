@extends('layouts.guest')
@section('content')
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form class="md-float-material form-material" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="text-center">
                        <img src="{{ App\Models\Setting::setting()->logo ?? 'assets/images/logo.png' }}" alt="logo.png" style="width: 9%;aspect-ratio: 3/2;object-fit: contain">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Sign up</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-primary">
                                        <input type="text" name="first_name" class="form-control" required=""
                                            autofocus>
                                        <span class="form-bar"></span>
                                        <label class="float-label">First Name</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-primary">
                                        <input type="text" name="last_name" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <input type="email" name="email" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Your Email Address</label>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-primary">
                                        <input type="password" name="password" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Password</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-primary">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-25 text-left">
                                <div class="col-md-12">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label>
                                            <input type="checkbox" value="">
                                            <span class="cr"><i
                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">I read and accept <a href="#">Terms &amp;
                                                    Conditions.</a></span>
                                        </label>
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                <div class="checkbox-fade fade-in-primary">
                                    <label>
                                        <input type="checkbox" value="">
                                        <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        <span class="text-inverse">Send me the <a href="#!">Newsletter</a> weekly.</span>
                                    </label>
                                </div>
                            </div> --}}
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit"
                                        class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up
                                        now</button>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-md-10">
                                    {{-- <p class="text-inverse text-left m-b-0">Thank you.</p> --}}
                                    <p class="text-inverse text-left"><a href="{{ route('login') }}"><b>Already have an
                                     account? LogIn Here</b></a></p>
                                </div>
                                {{-- <div class="col-md-2">
                                <img src="assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
@endsection
