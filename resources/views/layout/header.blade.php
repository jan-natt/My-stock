<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'StockPro - Market Navigation')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
   <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
     @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  

</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <i class="fas fa-chart-line"></i> StockPro
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="/market">Market</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">IPO Listings</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/ipo/upcoming">Upcoming</a></li>
              <li><a class="dropdown-item" href="/ipo/ongoing">Ongoing</a></li>
              <li><a class="dropdown-item" href="/ipo/closed">Closed</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="/pricing">Pricing</a></li>
          <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
        </ul>

        <div class="d-flex align-items-center">
          <div class="notification-icon">
            <a href="#" class="text-white"><i class="fas fa-bell"></i></a>
            <span class="notification-badge">3</span>
          </div>
            <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-register">List</a>

        </div>
      </div>
    </div>
  </nav>
  

  <!-- Market Ticker -->
  <div class="market-ticker">
    <div>BTC: <span class="up">$62,384.21 <i class="fas fa-arrow-up"></i></span></div>
    <div>S&P 500: <span class="up">4,891.23 <i class="fas fa-arrow-up"></i></span></div>
    <div>DOW: <span class="down">38,621.05 <i class="fas fa-arrow-down"></i></span></div>
    <div>NASDAQ: <span class="up">15,294.84 <i class="fas fa-arrow-up"></i></span></div>
  </div>

 <script src="{{ asset('js/script.js') }}"></script>


