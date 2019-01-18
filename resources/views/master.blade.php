<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Fredericka+the+Great|Open+Sans+Condensed:300" rel="stylesheet">        

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>
        <title>{{$title}}</title>
    </head>
    <body>
        <script> var base_url = "{{url('')}}"</script>
        <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom shadow-sm">
            <a class="navbar-brand" href="{{url('/')}}">myTeacher</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @if(!Cart::isEmpty())
            <a href="{{url('shop/checkout')}}">
                <i class="fas fa-shopping-cart">
                    <div class="csscart test">
                        {{Cart::getTotalQuantity()}}
                    </div>
                </i>
            </a>
            @endif

            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('shop')}}">Shop</a>
                    </li>   
                    @foreach ($menus as $menu)
                    <li class="nav-item">
                        <a class="nav-link" href="{{url($menu['url'])}}">{{$menu['title']}}</a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('contact-us')}}">Contact us</a>
                    </li>
                </ul>
            </div>

            @if(Session::has('is_admin'))
            <a class="btn btn-success" href="{{url('cms/dashboard')}}">CMS</a>
            @endif
            @if(!Session::has('user_id'))
            <a class="btn btn-outline-primary" href="{{url('user/signup')}}">Sign up</a>
            <a class="btn btn-outline-primary" href="{{url('user/signin')}}">Sign in</a>
            @else
            <span class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{session('user_name')}}  
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('user/'.session('user_id'))}}"><i class="fas fa-user-circle"></i> My account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('user/logout')}}"><i class="fas fa-sign-out-alt"></i> Log out</a>
                </div>
            </span>
            @endif
        </nav>


        <!--sad-->






        <div class="container">
            @if( Session::has('ms') )
            <div class="alert alert-success ms_box" role="alert">
                {{ Session::get('ms') }}
            </div>
            @endif

            @if(count($errors)>0)
            @foreach ($errors->all() as $message)
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @endforeach
            @endif

        </div>
        <div class="container mb-5">
            @yield('content')
        </div>          

        <footer id="myFooter">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 myCols">
                        <h5>Get started</h5>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('/shop')}}">Shop</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 myCols">
                        <h5>Company</h5>
                        <ul>
                            @foreach ($menus as $menu)
                            <li><a href="{{url($menu['url'])}}">{{$menu['title']}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-4 myCols">
                        <h5>Support</h5>
                        <ul>
                            <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="social-networks">
                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fab fa-facebook-square"></i></a>
                <a href="#" class="google"><i class="fab fa-google-plus-g"></i></a>
            </div>
            <div class="footer-copyright">
                <p class="">© 2018 Mikhail Borisov | <small>Made with laravel, bootstrap and jquery at HackerU</small></p>
                <p><small>This site is made for study purposes only, all the images are taken from free open sources</small></p>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


        <script src="{{asset('js/js.js')}}" type="text/javascript"></script>
    </body>
</html>