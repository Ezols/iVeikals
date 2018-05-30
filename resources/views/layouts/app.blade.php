<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'iVeikals') }}</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
    
    <!-- Custom CSS-->
    <link rel="stylesheet" href="{{ URL::to('src/css/app.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('home') }}">iVeikals</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @guest

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('contacts') }}">Contacts</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('delivery') }}">Delivery</a>
                        </div>
                    </li>
                </ul>

                @else
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admin</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('products') }}">ADMIN Products</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('categories') }}">ADMIN Categories</a>
                            </div>
                        </li>                 

                    
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('contacts') }}">Contacts</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('delivery') }}">Delivery</a>
                            </div>
                        </li>
                    </ul>             

                @endguest

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">    
                    <!-- Authentication Links -->
                    @guest
                    <li>
                        <a class="nav-link shoping-cart-link" href="{{ route('product.shoppingCart') }}"><i class="fas fa-shopping-cart"></i> 
                            @if (isset($cartProducts))
                                ( {{count(($cartProducts))}} ) 
                            @endif
                            Shoping Cart
                        <span class="badge badge-light"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>

                        <div class="cart-link-content">
                        @if (isset($cartProducts))
                                ( {{print_r(($cartProducts))}} ) 
                        @endif
                        </div>
                        </a>
                    </li>
                        <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                    <li>
                        <a class="nav-link shoping-cart-link" href="{{ route('product.shoppingCart') }}"><i class="fas fa-shopping-cart"></i> 
                            @if (isset($cartProducts))
                                ( {{count(($cartProducts))}} ) 
                            @endif
                            Shoping Cart
                        <span class="badge badge-light"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                        </a>
                    
                    </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative; padding:5px;">
                                <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:abosolute; top:10px; left:10px; border-radius:50%;">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>     
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript">
$('.shoping-cart-link').hover(function(){
    $('.cart-link-content').show();
},function(){
    $('.cart-link-content').hide();
});;

</script>

<style>
.shoping-cart-link {
    position:relative;
}
.cart-link-content {
    position:absolute;
    display:none;
    color:red;
    top:60px;
    left:1px;
    width:300px;
    height:500px;
    background:#212529;
}

</style>
</body>
</html>
