<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
        <title>E-Commerce | @yield('title')</title>
    </head>
    <body>
        <div class="container">
            <div class="nav">  
                <div class="up-nav">
                    <p style="margin-inline: 5px;">Contact Us</p>
                    <div class="left-nav">
                        <div class="status-user">
                            <span>
                                @if (Auth::guard('customer')->check())
                                    <a href="/logout">Logout</a>
                                @else
                                    <a href="/login">Sign In</a>
                                @endif
                            </span>
                        </div>
                        <div class="cart">
                            Cart
                        </div>
                    </div>
                </div>
                <div class="bot-nav">
                    <div class="left-logo">
                        <h3>Rafi-Olshop</h3>
                    </div>
                    <ul class="nav-collection">
                        <li class="nav-item"><a href="/">Home</a></li>
                        <li class="nav-item">Categories</li>
                        <li class="nav-item">Deals</li>
                        <li class="nav-item">Delivery</li>
                    </ul>
                    <div class="search">
                        <input type="text" name="" id="" placeholder="Search">
                    </div>
                </div>    
            </div>
            @if (session()->has('success'))
                <span class="notif">{{ session('success') }}</span>
            @endif
            <br>
            @yield('content')


            <div class="footer">
            </div>
        </div>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>