<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"  crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/trix.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/sheet.css')}}" rel="stylesheet" />
    <link href="{{asset('css/front.css')}}" rel="stylesheet" />


</head>
<body id="@yield('bodyID')">

    <div id="app">

        <div id="upperBar">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 text-left h-40" >
                        E-mail: company@gmail.com
                    </div>

                    <div class="col-md-4 text-center">
                        <a class="logo" href="{{ url('/') }}">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            Cyber<span class="logo-p-2">Shop</span>
                        </a>
                    </div>

                    <div class="col-md-4 text-right h-40">
                        Call Us: + 055 225 233 546
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">


                    <div  class="dropdown">
                        <button class="btn btn-default "
                                type="button" id="dropdownMenuButton2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-th"></i>
                        </button>
                        <div id="drop-cates" class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <h6 class="dropdown-header">All Categories</h6>

                              @if(\App\Category::all()->count() !=0)
                                @foreach(\App\Category::all()->where('parent_id','=',0) as $p_cate)
                                    <a class="dropdown-item" href="{{route('category.products',$p_cate->id)}}">{{$p_cate->cate_name}}</a>
                                    @foreach(\App\Category::all()->where('parent_id','=',$p_cate->id) as $cate)
                                        <a class="dropdown-item" class="pl-2" href="{{route('category.products',$cate->id)}}">--{{$cate->cate_name}}</a>
                                    @endforeach
                                @endforeach
                              @endif

                        </div>
                    </div>



                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">Services </a>
                        </li>    <li class="nav-item">
                            <a class="nav-link" href="">Contact us</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                    @if(Auth::user()->getRole() == 'super_admin')
                                        <a href="{{route('home')}}" class="dropdown-item">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            Home</a>
                                    @endif

                                    @if(Auth::user()->getRole() == 'super_admin')
                                        <a href="{{route('dashboard.index')}}" class="dropdown-item">
                                            <i class="fa fa-cogs" aria-hidden="true"></i>
                                            Dashboard</a>
                                    @endif

                                        @if(Auth::user())
                                            <a href="{{route('users.profile',Auth::user()->id)}}" class="dropdown-item">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                my profile</a>
                                        @endif

                                        <hr class=" m-0 p-0">

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>

                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>


    </div>
</body>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/trix.js') }}" rel="javascript" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js" rel="javascript" type="text/javascript"></script>
<script src="{{asset('js/custom.js')}}" rel="javascript" type="text/javascript"></script>






</html>
