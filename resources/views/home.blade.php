@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($animals as $key => $value)
                        <div class="row">
                            <img src="{{$images->where('id', $value->image_id)->first()}}" />
                            <div class="col-md-3">
                                {{$value->name}}
                            </div>
                            <div class="col-md-3">
                                {{$types->where('id', $value->animal_type_id)->first()->name}}
                            </div>
                            <div class="col-md-3">
                                {{$breeds->where('id', $value->breed_type_id)->first()->name}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
