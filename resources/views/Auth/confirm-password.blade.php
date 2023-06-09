@extends('layouts.guest')
@section('content')
<div class="container">
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <label for="password" :value="__('Password')" />

            <input id="password" class="block mt-1 w-full" type="password"
             name="password" required autocomplete="current-password" />
            {!! $errors->first('password', '<span class="alert-msg text-danger" aria-hidden="true">
            <i class="ti-info-alt" aria-hidden="true"></i> :message</span>',) !!}
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">
                {{ __('Confirm') }}
            </button>
        </div>
    </form>
</div>
@endsection
