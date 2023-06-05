@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10">
                    <h1 class="sub-title"><strong><h4> {{ $title }} </h4></strong></h1>
                </div>
                @can('permission create')
                <div class="col-sm-2">
                    <a type="button" href="{{ route('permissions.create') }}"
                        class="btn waves-effect waves-light btn-dark btn-outline-dark float-right">
                    <i class="ti-plus"> Add Permission </i></a>
                </div>
                @endcan
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive">
                <table id="permissions" class="table display alt-pagination table-wrapper">
                    <thead>
                        <tr>
                            <th>#Id</th>
                            <th>Name</th>
                            <th>Guard Name</th>
                            @canany(['permission edit', 'permission delete'])
                            <th class="border-top-0">Action</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id ?? '--' }}</td>
                                <td><a href="{{ route('permissions.show', $permission->id) }}">{{ $permission->name ?? '--' }}</a></td>
                                <td>{{ $permission->guard_name ?? '--' }}</td>
                                @canany(['permission edit', 'permission delete'])
                                <td>
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                                        @can('permission edit')
                                        <a type="button" href="{{ route('permissions.edit', $permission->id) }}"
                                            class="btn waves-effect waves-dark btn-primary btn-outline-primary btn-sm">
                                            <i class="ti-pencil"></i>
                                        </a>
                                        @endcan
                                        @can('permission delete')
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn waves-effect waves-dark btn-danger btn-outline-danger btn-sm"
                                            onclick="return confirm('Do you really want to delete this permissions!')">
                                            <i class="ti-trash"></i></button>
                                        @endcan
                                    </form>
                                </td>
                                @endcanany
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let table = new DataTable('#permissions');
    </script>
@endsection
