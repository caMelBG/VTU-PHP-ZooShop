@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        @include('admin.partials.error')

                        <form method="post" action="{{url('animal/update')}}" enctype="multipart/form-data">
                            <div class="form-group row">
                                {{csrf_field()}}
                                <input type="hidden" value="{{ $animal->id }}" name="id" />
                                <div class="col-sm-12">
                                    @if($animal->image_id != null)
                                        <img src="<?php echo asset('storage/sample-images/' . $avatar->fileName);?>"/>
                                    @endif
                                    <br/>
                                    <input type="file" class="" id="customImage" placeholder="customImage" name="customImage">
                                </div>
                                <label for="lgFormGroupInput" class="col-sm-4 col-form-label col-form-label-lg">Animal Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" value="{{ $animal->name }}" placeholder="Name" name="name">
                                </div>

                                <label for="lgFormGroupInput" class="col-sm-4 col-form-label col-form-label-lg">Type</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-lg" id="lgFormGroupInput" name="animal_type_id">
                                        @foreach($types as $key => $value)
                                            @if ($animal->animal_type_id == $value->id)
                                                <option selected value="{{ $value->id }}"> {{$value->name}} </option>
                                            @else
                                                <option value="{{ $value->id }}"> {{$value->name}} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <label for="lgFormGroupInput" class="col-sm-4 col-form-label col-form-label-lg">Breed</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-lg" id="lgFormGroupInput" name="animal_breed_id">
                                        @foreach($breeds as $key => $value)
                                            @if ($animal->animal_breed_id == $value->id)
                                                <option selected value="{{ $value->id }}"> {{$value->name}} </option>
                                            @else
                                                <option value="{{ $value->id }}"> {{$value->name}} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <label for="lgFormGroupInput" class="col-sm-4 col-form-label col-form-label-lg">Birth date</label>
                                <div class="col-sm-8">
                                    <input name="birth_date" type="date" class="form-control form-control-lg" id="lgFormGroupInput" value="{{ $animal->birth_date }}" placeholder="Name" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <a href="{{ URL::to('animal') }}" class="pull-right btn btn-success">List All</a>
                                <div class="col-md-2"></div>
                                <input type="submit" class="btn btn-primary">
                               </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
