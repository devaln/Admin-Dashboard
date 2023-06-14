@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h5> Profile </h5>
    </div>
    <div class="card-block">
        <div class="card">
            @include('profile.partials.update-profile-information-form')
        </div>
        <div class="card">
            @include('profile.partials.update-password-form')
        </div>
        <div class="card">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection