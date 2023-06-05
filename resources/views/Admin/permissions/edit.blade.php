@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10">
                    <h1 class="sub-title"><strong><h4> {{ $title }} </h4></strong></h1>
                </div>
                <div class="col-sm-2">
                    <a type="button" href="{{ route('permissions.index') }}" class="btn waves-effect waves-light btn-dark btn-outline-dark float-right"><i class="ti-arrow-circle-left"> Back </i></a>
                </div>
            </div>
        </div>
        <div class="card-block">
            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($permission->id)
                    @method('PUT')
                @endif
                <div class="form-body" align="center">

                    {{-- First Name --}}
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name :</label>
                        <div class="col-sm-10">
                            <input type="text" id="name" value="{{ old('name', $permission->name) }}"
                                name="name" placeholder="First Name"  autofocus class="form-control col-lg-6">
                            {!! $errors->first(
                                'name',
                                '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                </i> :message</span>',
                            ) !!}
                        </div>
                    </div>

                    {{-- Guard Name --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Guard Name :</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ old('guard_name', $permission->guard_name) }}"
                                class="form-control col-lg-6" placeholder="Guard Name" name="guard_name">
                            {!! $errors->first(
                                'guard_name',
                                '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                                </i> :message</span>',
                            ) !!}
                        </div>
                    </div>

                </div>
                <div class="form-group-btn float-right">
                    <a type="button" href="{{ route('permissions.index') }}"
                        class="btn btn-mat waves-effect waves-light btn-danger"><i class="ti-close"> Cancel </i></a>
                    <button type="submit" class="btn btn-mat waves-effect waves-light btn-success"><i class="ti-save">
                            Save </i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
