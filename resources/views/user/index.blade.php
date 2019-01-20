@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <br/>
                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (\Session::has('success'))
                            <div class="alert alert-info">{{\Session::get('success') }}</div>
                        @endif

                        <h2>Users</h2>
                        <table class="table table-striped">
                            <thead>
                            <tr class="row">
                                <td class="col-md-1">ID</td>
                                <td class="col-md-4">Name</td>
                                <td class="col-md-4">Email</td>
                                <td class="col-md-3">Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $value)
                                <tr class="row">
                                    <td class="col-md-1">{{ $value->id }}</td>
                                    <td class="col-md-4">{{ $value->name }}</td>
                                    <td class="col-md-4">{{ $value->email }}</td>
                                    <td class="col-md-3">
                                        @if( Auth::user()->isUserIsAdmin($value->id) == false)
                                            <a href="{{ route('users.edit', ['id' =>$value->id])}}" class="btn btn-primary" onclick="return confirm('Are you sure?');">Make admin</a>
                                        @endif
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
@endsection
