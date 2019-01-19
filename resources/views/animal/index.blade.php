@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <a href="{{ URL::to('animal/create') }}" class="pull-right btn btn-success">Add New</a>
                    </div>
                    <br/>
                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (\Session::has('success'))
                            <div class="alert alert-info">{{\Session::get('success') }}</div>
                        @endif

                        <h2>Animals</h2>
                        <table class="table table-striped">
                            <thead>
                            <tr class="row">
                                <td class="col-md-1">ID</td>
                                <td class="col-md-2">Name</td>
                                <td class="col-md-3">Type</td>
                                <td class="col-md-3">Breed</td>
                                <td class="col-md-3">Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($animals as $key => $value)
                                <tr class="row">
                                    <td class="col-md-1">{{ $value->id }}</td>
                                    <td class="col-md-2">{{ $value->name }}</td>
                                    <td class="col-md-3">{{ $types->where('id', $value->animal_type_id)->first()->name }}</td>
                                    <td class="col-md-3">{{ $breeds->where('id', $value->animal_breed_id)->first()->name }}</td>
                                    <td class="col-md-3">
                                        <a href="{{ route('animal.edit', ['id' =>$value->id])}}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('animal.destroy', $value->id)}}" method="post" class="custom-control-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?');">Delete</button>
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
@endsection
