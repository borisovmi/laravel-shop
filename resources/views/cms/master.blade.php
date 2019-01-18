
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>{{$title}}</title>

        <!-- Bootstrap core CSS-->
        <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Custom fonts for this template-->
        <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">

    </head>

    <body id="page-top">

        <nav class="navbar navbar-expand navbar-dark bg-dark static-top row justify-content-between">
            <div class="navbar-brand">
                <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
                    <i class="fas fa-bars ml-2"></i>
                </button>
                <a class="navbar-brand" href="{{url('cms/dashboard')}}">CMS Admin Panel</a>

            </div>


            <div class="mr-2">
                <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="" href="#">
                    <a class="btn btn-success" href="{{url('shop')}}">Back to Shop</a>
                </button>
                <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="" href="#">
                    <a class="btn btn-outline-primary" href="{{url('user/logout')}}">Log out</a>
                </button>
            </div>


        </nav>

        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="sidebar navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('cms/dashboard')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{url('cms/menu')}}">

                        <i class="fas fa-fw fa-th"></i>
                        <span>Menus</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('cms/content')}}">
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Content</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('cms/category')}}">
                        <i class="fas fa-fw fa-briefcase"></i>
                        <span>Categories</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('cms/product')}}">
                        <i class="fas fa-fw fa-tag"></i>
                        <span>Products</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('cms/order')}}">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                        <span>Orders</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('cms/user')}}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Users</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('cms/message')}}">
                        <i class="fas fa-fw fa-comment"></i>
                        <span>Messages</span></a>
                </li>
            </ul>

            <div id="content-wrapper">

                <div class="container-fluid">

                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">{{$inner_title}}</li>
                    </ol>

                    

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


                    <div class="row">
                        @yield('content')
                    </div>
                </div>

            </div>
        </div>


        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Page level plugin JavaScript-->
        <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset('js/sb-admin.min.js')}}"></script>

        <!-- Demo scripts for this page-->
        <script src="{{asset('js/datatables-demo.js')}}"></script>
        <script src="{{asset('js/chart-area-demo.js')}}"></script>
        <script src="{{asset('js/js.js')}}"></script>
    </body>

</html>



