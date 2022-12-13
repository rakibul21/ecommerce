<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/')}}css/all.css">
    <link rel="stylesheet" href="{{asset('/')}}css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark shadow " style="border: 2px solid lime">
    <div class="container " >
        <a href="" class="navbar-brand text-color-c fw-bold">ECOMMERCE</a>
        <ul class="navbar-nav ">
            <li><a href="{{route('home')}}" class="nav-link text-color-c-nav">Home</a></li>
            @if(isset(Auth::user()->id))
            <li class="dropdown">
                <a href="" class="nav-link text-color-c-nav dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('category.index')}}" class="dropdown-item ">Add Category</a></li>
                    <li><a href="{{route('category.manage')}}" class="dropdown-item ">Manage Category</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="" class="nav-link text-color-c-nav dropdown-toggle" data-bs-toggle="dropdown">Brand</a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('brand.create')}}" class="dropdown-item">Add Brand</a></li>
                    <li><a href="{{route('brand.index')}}" class="dropdown-item">Manage Brand</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="" class="nav-link text-color-c-nav dropdown-toggle" data-bs-toggle="dropdown">Product</a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('product.create')}}" class="dropdown-item">Add Product</a></li>
                    <li><a href="{{route('product.index')}}" class="dropdown-item">Manage Product</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="" class="nav-link text-color-c-nav dropdown-toggle" data-bs-toggle="dropdown">Comment</a>
                <ul class="dropdown-menu">
                    <li><a href="" class="dropdown-item">Manage Comment</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="" class="nav-link text-color-c-nav dropdown-toggle" data-bs-toggle="dropdown">{{Auth::user()->name}}</a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('product.create')}}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Logout</a></li>
                    <form action="{{route('logout')}}" method="POST" id="logoutForm">
                        @csrf
                    </form>
                </ul>
            </li>
            @else
                <li><a href="{{route('login')}}" class="nav-link">Login</a></li>
            @endif
        </ul>
    </div>
</nav>


@yield('body')
<script src="{{asset('/')}}js/bootstrap.bundle.js"></script>
<script src="{{asset('/')}}js/jquery-3.6.1.js"></script>

</body>
</html>
