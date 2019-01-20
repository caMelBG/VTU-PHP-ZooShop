@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        @include('admin.partials.error')

                        <form method="post" action="{{url('admin/images')}}" enctype="multipart/form-data">
                            <div class="form-group row">
                                {{csrf_field()}}
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Description" name="imageDescription">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="customImage" class="col-sm-2 col-form-label col-form-label-lg">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control form-control-lg" id="customImage" placeholder="customImage" name="customImage">
                                </div>
                            </div>


                            <div class="form-group row">
                                <a href="{{ URL::to('admin/images') }}" class="pull-right btn btn-success">List all</a>
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
