<div class="card-header">
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('Profile Information') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
        {{ __("Update your account's profile information and email address.") }}
    </p>
</div>
<div class="card-block">
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="">
        @csrf
        @method('patch')
        <div class="" align="center">
            {{-- Avatar --}}
            <div class="form-item mb-4" align="center">
                <div class="input-wrapper">
                    <div class="custom-input-file-user">
                        <div class="input-file-wrapper-user p-3">
                            <img src="{{ $pro_user->avatar ? $pro_user->avatar : '/assets/images/no-image.jpg' }}"
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
                    <input type="text" id="first_name" value="{{ old('first_name', $pro_user->first_name) }}"
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
                <label class="col-sm-2 col-form-label">MiddleName :</label>
                <div class="col-sm-10">
                    <input type="text" value="{{ old('middle_name', $pro_user->middle_name) }}"
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
                    <input type="text" value="{{ old('last_name', $pro_user->last_name) }}" class="form-control col-lg-6"
                        placeholder="Last Name" name="last_name" required>
                    {!! $errors->first(
                        'last_name',
                        '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                        </i> :message</span>',
                    ) !!}
                </div>
            </div>

            {{-- Email Address --}}
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">E-mail Address :</label>
                <div class="col-sm-10">
                    <input type="email" id="email" placeholder="E-mail Address"
                        value="{{ old('email', $pro_user->email) }}" class="form-control col-lg-6" name="email"
                        autocomplete="current-password">
                    {!! $errors->first(
                        'email',
                        '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                        </i> :message</span>',
                    ) !!}
                    @if ($pro_user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$pro_user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            {{-- Phone Number --}}
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Phone Number :</label>
                <div class="col-sm-10">
                    <input type="text" value="{{ old('phone', $pro_user->phone) }}" class="form-control col-lg-6"
                        name="phone" placeholder="Phone Number" maxlength="10">
                    {!! $errors->first(
                        'phone',
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
                        {{ $pro_user->gender === 'Male' ? 'checked' : '' }}>&nbsp; Male &nbsp;
                    <input type="radio" value="Female" name="gender"
                        {{ $pro_user->gender === 'Female' ? 'checked' : '' }}>&nbsp; Female &nbsp;
                    <input type="radio" value="Other" name="gender"
                        {{ $pro_user->gender === 'Other' ? 'checked' : '' }}>&nbsp; Other &nbsp;
                </div>
            </div>

            {{-- date_of_birth  --}}
            <div class="form-group row">
                <label for="date_of_birth" class="col-sm-2 col-form-label">Birth Date :</label>
                <div class="col-sm-10">
                    <input type="date" id="date_of_birth" class="form-control col-lg-6" placeholder="Birth Date"
                        value="{{ old('date_of_birth', $pro_user->date_of_birth) }}" name="date_of_birth">
                    {!! $errors->first(
                        'date_of_birth',
                        '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                        </i> :message</span>',
                    ) !!}
                </div>
            </div>
        </div>

        <div class="group-button float-right">
            <button class="btn btn-mat waves-effect waves-light btn-primary" type="submit"><i
                    class="ti-save">{{ __(' Save ') }}</i></button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</div>
