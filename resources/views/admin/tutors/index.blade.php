@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tutors
                        <a href="{{ URL::to('admin/tutors/create') }}" class="pull-right">Create a Tutor</a>
                    </div>

                    <div class="panel-body">
                        @if (\Session::has('success'))
                            <div class="alert alert-info">{{\Session::get('success') }}</div>
                        @endif

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allTutors as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="{{ URL::to('admin/tutors/' . $value->id . '/edit') }}">Edit tutor</a>

                                        <form action="{{action('Admin\TutorsController@destroy', $value->id )}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                            {{ $allTutors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
