<html>
<head>
    <title>Zoo Planet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!--Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Duru+Sans|Actor' rel='stylesheet' type='text/css'>

    <!--Bootshape-->
    <link href="../../css/bootshape.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<style>
   input, option {
       font-size: 20;
   }
</style>

<!-- Navigation bar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('home') }}"><span class="green">Zoo</span> Planet</a>
        </div>
        <nav role="navigation" class="collapse navbar-collapse navbar-right">
            <ul class="navbar-nav nav">
                @if ( Auth::user() != null && Auth::user()->hasRole('admin') == true)
                    <li><a class=""href="{{ url('animal') }}"><i class="fa fa-list"></i> <span>Animals</span></a></li>
                    <li><a class=""href="{{ url('admin/images') }}"><i class="fa fa-list"></i> <span>Images</span></a></li>
                    <li><a class=""href="{{ url('animalType') }}"><i class="fa fa-list"></i> <span>Types</span></a></li>
                    <li><a class=""href="{{ url('animalBreed') }}"><i class="fa fa-list"></i> <span>Breeds</span></a></li>
                    <li><a class=""href="{{ url('users') }}"><i class="fa fa-list"></i> <span>Users</span></a></li>
                @endif

                <!-- Authentication Links -->
                @guest
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
</div><!-- End Navigation bar -->

<!-- Slide gallery -->
<div class="jumbotron">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/carousel1.jpg" alt="">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <img src="img/carousel2.jpg" alt="">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <img src="img/carousel3.jpg" alt="">
                <div class="carousel-caption">
                </div>
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div><!-- End Slide gallery -->
<h3 class="text-center">
    <form class="row" method="get" action="{{url('home/index')}}" >

        <div class="form-group col-md-2 col-md-offset-2">
            <input type="text" name="query" placeholder="Име" value="{{$query}}" class="form-control"/>
        </div>

        <div class="form-group col-md-2">
            <select class="form-control" name="animal_type_id">
                @if($animal_type_id == null)
                    <option value="" selected> Вид </option>
                @endif
                @foreach($types as $key => $value)
                    @if($value->id == $animal_type_id)
                        <option selected value="{{$value->id}}">{{$value->name}}</option>
                    @else
                        <option value="{{$value->id}}">{{$value->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-2">
            <select class="form-control" name="animal_breed_id">
                <option value="" selected> Порода </option>
                @foreach($breeds as $key => $value)
                    @if($value->id == $animal_breed_id)
                        <option selected value="{{$value->id}}">{{$value->name}}</option>
                    @else
                        <option value="{{$value->id}}">{{$value->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-1">
            <input class="form-control" type="submit" value="Търсене"/>
        </div>
    </form>
</h3>
<!-- Thumbnails -->
<div class="container thumbs">

    @foreach($animals as $key => $value)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                @if($value->image != null)
                    <img class="img-circle" style="height: 200px;" src="<?php echo asset('storage/sample-images/' . $value->image->fileName);?>">
                @else
                    <img class="img-circle" src="<?php echo asset('storage/sample-images/default.jpeg');?>"/>
                @endif
                <div class="caption">
                    <h3 class="text-center">
                        {{$value->name}}
                    </h3>
                    <h3 class="text-center">{{$value->type->name}} | {{$value->breed->name}}</h3>
                </div>
            </div>
        </div>
    @endforeach

</div><!-- End Thumbnails -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<script src="../../js/bootstrap.min.js"/>
<script src="../../js/bootstrap.js"/>
</body>
</html>