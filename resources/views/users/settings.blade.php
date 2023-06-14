@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10">
                    <h1 class="sub-title"><strong><h4> {{ $title }} </h4></strong></h1>
                </div>
                <div class="col-sm-2">
                    <a type="button" href="{{ route('dashboard') }}" class="btn waves-effect waves-light btn-dark btn-outline-dark float-right"><i class="ti-arrow-circle-left"> Back </i></a>
                </div>
            </div>
        </div>
        <div class="card-block">
            <form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($setting->id)
                    @method('PUT')
                @endif
                <div class="form-body" align="center">
                    {{-- Site Name --}}
                    <div class="form-group row">
                        <label for="first_name" class="col-sm-2 col-form-label">Web-Site Name :</label>
                        <div class="col-sm-10">
                            <input type="text" id="site_name" value="{{ old('site_name', $setting->site_name) }}"
                                name="site_name" placeholder="Web-Site Name" required autofocus class="form-control col-lg-6">
                            {!! $errors->first(
                                'site_name',
                                '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                </i> :message</span>',
                            ) !!}
                        </div>
                    </div>

                    {{-- logo --}}
                    <div class="form-group row">
                        <label for="profimg" class="col-sm-2 col-form-label"> Site Logo :</label>
                        <div class="col-sm-10">
                            <div class="form-item mb-4">
                                <div class="input-wrapper">
                                    <div class="custom-input-file-user">
                                        <div class="input-file-wrapper-user p-3">
                                            <img src="{{ $setting->logo ? $setting->logo : asset('/assets/images/noimage.jpg') }}"
                                                alt="avatar" id="profileimg"
                                                style="max-width: 160px;max-height: 160px;border: 2px solid black">
                                            <input type="file" onchange="preview()" accept="image/*" id="profimg"
                                                style="display: none" name="logo"><br>
                                            <p>Click on image to change the logo.</p>
                                        </div>
                                    </div>
                                </div>
                                {!! $errors->first('logo', '<span class="alert-msg text-danger" aria-hidden="true">
                                <i class="ti-info-alt-circle" aria-hidden="true"></i> :message</span>', ) !!}
                            </div>
                        </div>
                    </div>

                    {{-- type --}}
                    <div class="form-group row">
                        <label for="first_name" class="col-sm-2 col-form-label">First Name :</label>
                        <div class="col-sm-10">
                            <select type="text" id="first_name" value="{{ old('first_name', $setting->type) }}"
                                name="type" placeholder="First Name" required autofocus class="form-control col-lg-6">
                                <option selected>{{ ($setting->type)? $setting->type : 'Choose Which type suites' }}</option>
                                <option value="Logo">Logo</option>
                                <option value="Text">Text</option>
                                <option value="Logo + Text">Logo + Text</option>
                            </select>
                            {!! $errors->first(
                                'first_name',
                                '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                </i> :message</span>',
                            ) !!}
                        </div>
                    </div>

                    {{-- favicon --}}
                    <div class="form-group row">
                        <label for="site-favicon" class="col-sm-2 col-form-label"> Favicon :</label>
                        <div class="col-sm-10">
                            <div class="form-item mb-4">
                                <div class="input-wrapper">
                                    <div class="custom-input-file-user">
                                        <div class="input-file-wrapper-user p-3">
                                            <img src="{{ $setting->favicon ?? asset('/assets/images/noimage.jpg') }}"
                                                alt="favicon" id="favicon"
                                                style="max-width: 160px;max-height: 160px;border: 2px solid black">
                                            <input type="file" onchange="preview2()" accept="image/*" id="site-favicon"
                                                style="display: none" name="favicon"><br>
                                            <p>Click on image to change the favicon.</p>
                                        </div>
                                    </div>
                                </div>
                                {!! $errors->first('favicon', '<span class="alert-msg text-danger" aria-hidden="true">
                                <i class="ti-info-alt-circle" aria-hidden="true"></i> :message</span>', ) !!}
                            </div>
                        </div>
                    </div>

                    {{-- Footer --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Footer :</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ old('Footer', $setting->footer) }}"
                                class="form-control col-lg-6" placeholder="Footer...." name="footer" required>
                            {!! $errors->first(
                                'last_name',
                                '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                </i> :message</span>',
                            ) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group-btn float-right">
                    <a type="button" href="{{ route('users.index') }}"
                        class="btn btn-mat waves-effect waves-light btn-danger"><i class="ti-close"> Cancel </i></a>
                    <button type="submit" class="btn btn-mat waves-effect waves-light btn-success"><i class="ti-save">
                            Save </i></button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#favicon').click(function() {
            $('#site-favicon').click();
        });

        function preview2() {
            favicon.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
