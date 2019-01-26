@extends('layouts.app')

<style>
    #home-page img {
        width: 100px;
        height: 100px;
    }
</style>

@section('content')
<div class="container" id="home-page">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($animals as $key => $value)
                        <div class="row">
                            @if($value->image != null)
                                <img src="<?php echo asset('storage/sample-images/' . $value->image->fileName);?>"/>
                            @else
                                <img src="<?php echo asset('storage/sample-images/default.jpeg');?>"/>
                            @endif
                            <div class="col-md-3">
                                {{$value->name}}
                            </div>
                            <div class="col-md-3">
                                {{$value->type->name}}
                            </div>
                            <div class="col-md-3">
                                {{$value->breed->name}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
