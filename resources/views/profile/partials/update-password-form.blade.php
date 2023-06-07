<div class="card-header">
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('Update Password') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </p>
</div>
<div class="card-block">
    <form method="post" action="{{ route('password.update') }}" class="">
        @csrf
        @method('put')

        {{-- Current Password --}}
        <div class="form-group row">
            <label for="current_password" class="col-sm-2 col-form-label">Current Password :</label>
            <div class="col-sm-10">
                <input type="password" id="current_password" placeholder="Current Password"
                    class="form-control col-lg-6" name="current_password" autocomplete="current-password">
                {!! $errors->first(
                    'current_password',
                    '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                    </i> :message</span>',
                ) !!}
            </div>
        </div>

        {{-- New Password --}}
        <div class="form-group row">
            <label for="current_password" class="col-sm-2 col-form-label">New Password :</label>
            <div class="col-sm-10">
                <input type="password" id="password" placeholder="New Password"
                    class="form-control col-lg-6" name="password" autocomplete="New-password">
                {!! $errors->first(
                    'password',
                    '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                    </i> :message</span>',
                ) !!}
            </div>
        </div>

        {{-- Confirm Password --}}
        <div class="form-group row">
            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password :</label>
            <div class="col-sm-10">
                <input type="password" id="password_confirmation" placeholder="Confirm Password"
                    class="form-control col-lg-6" name="password_confirmation" autocomplete="current-password">
                {!! $errors->first(
                    'password_confirmation',
                    '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                    </i> :message</span>',
                ) !!}
            </div>
        </div>

        {{-- <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full"  />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div> --}}
        <div class="button-group">
            <button class="btn btn-mat waves-effect waves-light btn-primary" type="submit"><i class="ti-save">{{ __(' Save ') }}</i></button>
            @if (session('status') === 'password-updated')
                <p class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</div>
