<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-dQl4kN5cu/RM/Ntgyu5S2XGpnuMCfyWwqSiQq8JzQlF5r4S8Xp1P95Y7b1ep1CO" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-rnqQNRhEe3zYOFJtML8GL6W5OFQhI9uIkDlTdY2Ljzo8hX8faZ6E3HDZL1En/gwC" crossorigin="anonymous"></script>
    <title>PetShop - Your Pet's Paradise</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #ffc0cb;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #ff69b4 !important;
            padding: 10px;
        }

        .navbar-brand {
            font-size: 1.8rem;
            color: #ffffff !important;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
            margin-right: 15px;
        }

        .btn-pink {
            background-color: #ff1493 !important;
            color: #ffffff !important;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn-pink:hover {
            background-color: #c71585 !important;
        }

        .container {
            margin-top: 20px;
            width: 90%;
        }

        .main-content {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
        }

        .footer {
            background-color: #ff69b4 !important;
            color: #ffffff !important;
            padding: 10px 0;
            text-align: center;
        }

        .login-register-links {
            display: flex;
            align-items: center;
        }

        .login-register-links a {
            color: #ffffff !important;
            margin: 0 10px;
            text-decoration: none;
        }

        .login-register-links a.btn-pink {
            background-color: #ff1493 !important;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .login-register-links a.btn-pink:hover {
            background-color: #c71585 !important;
        }

        .nav-item.dropdown {
            position: relative;
        }

        .nav-link.dropdown-toggle::after {
            content: none; /* Remove the default caret icon */
        }

    </style>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div id="app">
        <!-- Navbar Section -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid justify-content-between">
                <a class="navbar-brand" href="{{ url('/') }}">
                    PetShop
                </a>

                <div class="navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown ml-auto">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('cart.index') }}">Cart</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            <div class="main-content">
                @yield('content')
            </div>
        </div>

        <!-- Footer Section -->
        <footer class="footer text-center py-3 bg-dark text-light">
            &copy; {{ date('Y') }} PetShop - Your Pet's Paradise

            <!-- Customer Service Section -->
            <div class="mt-3">
                <h5>Customer Service</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>

            <!-- Blogs and Social Media Section -->
            <div class="mt-3">
                <h5>Blogs and Social Media</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <!-- Add your social media icons and links here -->
            </div>
        </footer>
    </div>
</body>
</html>
