@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10">
                    <h1 class="sub-title"><strong><h4> {{ $title }} </h4></strong></h1>
                </div>
                @can('user create')
                <div class="col-sm-2">
                    <a type="button" href="{{ route('users.create') }}"
                        class="btn waves-effect waves-light btn-dark btn-outline-dark float-right">
                    <i class="ti-plus"> Add User </i></a>
                </div>
                @endcan
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive">
                <table id="users" class="table display alt-pagination table-wrapper">
                    <thead>
                        <tr>
                            <th>#Id</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Phone Number</th>
                            <th>Gender</th>
                            <th>BirthDate</th>
                            @canany(['user update', 'user view', 'user delete'])
                            <th class="border-top-0">Action</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id ?? '--' }}</td>
                                <td><a href="{{ route('users.show', $user->id) }}">{{ $user->first_name ?? '' }}
                                        {{ $user->last_name ?? '' }}</a></td>
                                <td>{{ $user->email ?? '--' }}</td>
                                <td>{{ $user->phone ?? '--' }}</td>
                                <td>{{ $user->gender ?? '--' }}</td>
                                <td>{{ $user->date_of_birth ?? '--' }}</td>
                                @canany(['user update', 'user delete'])
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @can('user update')
                                        <a type="button" href="{{ route('users.edit', $user->id) }}"
                                            class="btn waves-effect waves-dark btn-primary btn-outline-primary btn-sm">
                                            <i class="ti-pencil"></i>
                                        </a>
                                        @endcan
                                        @can('user delete')
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" id="delete_button" onclick="confirmdelete()"
                                            class="btn waves-effect waves-dark btn-danger btn-outline-danger btn-sm">
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
        let table = new DataTable('#users');
        function confirmdelete (id) {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
            }
        })
        }
    </script>
@endsection
{{-- return confirm('Do you really want to delete this users!') --}}