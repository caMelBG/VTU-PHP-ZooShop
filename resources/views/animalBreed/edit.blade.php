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

                        <form method="post" action="{{url('animalBreed/update')}}" enctype="multipart/form-data">
                            <div class="form-group row">
                                {{csrf_field()}}
                                <label for="lgFormGroupInput" class="col-sm-4 col-form-label col-form-label-lg">Animal Breed Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" value="{{ $animalBreed->name }}" placeholder="Name" name="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <a href="{{ URL::to('animalBreed') }}" class="pull-right btn btn-success">List All</a>
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
