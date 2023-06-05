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

    <form method="post" action="{{ route('profile.update') }}" class="">
        @csrf
        @method('patch')

        {{-- First Name --}}
        <div class="form-group row">
            <label for="first_name" class="col-sm-2 col-form-label">First Name :</label>
            <div class="col-sm-10">
                <input type="text" id="first_name" placeholder="First Name" value="{{ old('first_name', $user->first_name)}}"
                    class="form-control col-lg-6" name="first_name" autocomplete="current-password">
                {!! $errors->first(
                    'first_name',
                    '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                    </i> :message</span>',
                ) !!}
            </div>
        </div>

        {{-- Middle Name --}}
        <div class="form-group row">
            <label for="last_name" class="col-sm-2 col-form-label">Middle Name :</label>
            <div class="col-sm-10">
                <input type="text" id="last_name" placeholder="Middle Name" value="{{ old('last_name', $user->last_name)}}"
                    class="form-control col-lg-6" name="last_name" autocomplete="current-password">
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
                <input type="email" id="email" placeholder="E-mail Address" value="{{ old('email', $user->email)}}"
                    class="form-control col-lg-6" name="email" autocomplete="current-password">
                {!! $errors->first(
                    'email',
                    '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                    </i> :message</span>',
                ) !!}
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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

        <div class="group-button">
            <button class="btn btn-mat waves-effect waves-light btn-primary" type="submit"><i class="ti-save">{{ __(' Save ') }}</i></button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</div>
