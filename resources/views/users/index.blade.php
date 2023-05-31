@extends('layouts.app')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">All Users</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Settings</a>
                            </li>
                            <li class="breadcrumb-item active">All Users
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="media width-250 float-right">
                    <media-left class="media-middle">
                        <div id="sp-bar-total-sales"></div>
                    </media-left>
                    <div class="media-body media-right text-right">
                        <a class="btn btn-sm btn-primary box-shadow-2 round btn-min-width pull-right white"
                            href="{{ route('users.create') }}">
                            <i class="ft-plus white"></i>Add User
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Base style table -->
            <section id="base-style">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                                <h4 class="card-title float-left">Users</h4>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="card-content collapse show">
                                <div class="container">

                                    <div class="card-body mt-1">
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
                                                        <th class="border-top-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->id }}</td>
                                                        <td><a href="{{ route('users.show', $user->id) }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->phone }}</td>
                                                        <td>{{ $user->gender }}</td>
                                                        <td>{{ $user->date_of_birth }}</td>
                                                        <td>
                                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                                <a href="{{ route('users.edit', $user->id) }}">
                                                                    <i class="la la-pencil success font-medium-1 mr-1"></i>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-outline-light btn-round" onclick="return confirm('Do you really want to delete this users!')">
                                                                    <i class="la la-trash danger font-medium-1 mr-1"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section("script")
    <script>
        let table = new DataTable('#users');
    </script>
@endsection
