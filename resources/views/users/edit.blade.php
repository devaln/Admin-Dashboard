@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10">
                    <h1 class="sub-title"><strong><h4> {{ $title }} </h4></strong></h1>
                </div>
                <div class="col-sm-2">
                    <a type="button" href="{{ route('users.index') }}" class="btn waves-effect waves-light btn-dark btn-outline-dark float-right"><i class="ti-arrow-circle-left"> Back </i></a>
                </div>
            </div>
        </div>
        <div class="card-block">
            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($user->id)
                    @method('PUT')
                @endif
                <div class="form-body" align="center">
                    {{-- Avatar --}}
                    <div class="form-item mb-4">
                        <div class="input-wrapper">
                            <div class="custom-input-file-user">
                                <div class="input-file-wrapper-user p-3">
                                    <img src="{{ $user->avatar ? $user->avatar : asset('/assets/images/no-image.jpg') }}"
                                        alt="avatar" id="profileimg"
                                        style="max-width: 160px;max-height: 160px;border-radius: 50%">
                                    <input type="file" onchange="preview()" accept="image/*" id="profimg"
                                        style="display: none" name="avatar"><br>
                                    <label for="profimg" class="col-sm-2 col-form-label text-primary"> Profile Image
                                    </label>
                                    <p>Click on image to change the profile image.</p>
                                </div>
                            </div>
                            {!! $errors->first('avatar', '<span class="alert-msg text-danger" aria-hidden="true">
                            <i class="ti-info-alt-circle" aria-hidden="true"></i> :message</span>', ) !!}
                        </div>
                    </div>

                    {{-- First Name --}}
                    <div class="form-group row">
                        <label for="first_name" class="col-sm-2 col-form-label">First Name :</label>
                        <div class="col-sm-10">
                            <input type="text" id="first_name" value="{{ old('first_name', $user->first_name) }}"
                                name="first_name" placeholder="First Name" required autofocus class="form-control col-lg-6">
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
                                class="form-control col-lg-6" name="password" placeholder="Password" required>
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
                            <input type="radio" value="Male" name="gender"
                                {{ $user->gender === 'Male' ? 'checked' : '' }}>&nbsp; Male &nbsp;
                            <input type="radio" value="Female" name="gender"
                                {{ $user->gender === 'Female' ? 'checked' : '' }}>&nbsp; Female &nbsp;
                            <input type="radio" value="Other" name="gender"
                                {{ $user->gender === 'Other' ? 'checked' : '' }}>&nbsp; Other &nbsp;
                        </div>
                    </div>

                    {{-- date_of_birth  --}}
                    <div class="form-group row">
                        <label for="date_of_birth" class="col-sm-2 col-form-label">date_of_birth</label>
                        <div class="col-sm-10">
                            <input type="date" id="date_of_birth" class="form-control col-lg-6"
                                placeholder="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}"
                                name="date_of_birth" required>
                            {!! $errors->first(
                                'date_of_birth',
                                '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                </i> :message</span>',
                            ) !!}
                        </div>
                    </div>

                    {{-- <div class="py-2">
                        <h3 class="inline-block text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200 py-4 block sm:inline-block flex">Roles</h3>
                        <div class="grid grid-cols-4 gap-4">
                            @forelse ($roles as $role)
                                <div class="col-span-4 sm:col-span-2 md:col-span-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="roles[]" value="{{ $role->name }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @empty
                                ----
                            @endforelse
                        </div>
                    </div> --}}
                    <div class="py-2">
                        <h3 class="inline-block text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200 py-4 block sm:inline-block flex">Roles</h3>
                        <div class="grid grid-cols-4 gap-4">
                            @forelse ($roles as $role)
                                <div class="col-span-4 sm:col-span-2 md:col-span-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ in_array($role->id, $userHasRoles) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @empty
                                ----
                            @endforelse
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
        $('#profileimg').click(function() {
            $('#profimg').click();
        });

        function preview() {
            profileimg.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
