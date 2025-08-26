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
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <style>
    :root {
      --primary-color: #2563eb;
      --secondary-color: #0f172a;
      --accent-color: #22c55e;
      --danger-color: #ef4444;
      --light-bg: #f8fafc;
      --dark-text: #1e293b;
      --gray-text: #64748b;
      --border-radius: 8px;
      --transition: all 0.3s ease;
    }
    
    body {
      font-family: 'Nunito', sans-serif;
      background-color: var(--light-bg);
      padding-top: 80px;
    }
    
    /* Navbar Styles */
    .navbar {
      background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 0.8rem 1rem;
    }
    
    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      display: flex;
      align-items: center;
    }
    
    .navbar-brand i {
      color: var(--accent-color);
      margin-right: 0.5rem;
      font-size: 1.8rem;
    }
    
    .nav-item {
      margin: 0 0.3rem;
    }
    
    .nav-link {
      font-weight: 600;
      color: rgba(255, 255, 255, 0.85) !important;
      padding: 0.5rem 1rem !important;
      border-radius: var(--border-radius);
      transition: var(--transition);
      position: relative;
    }
    
    .nav-link:hover, .nav-link.active {
      color: white !important;
      background: rgba(255, 255, 255, 0.1);
    }
    
    .nav-link:after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: 0;
      left: 50%;
      background-color: var(--accent-color);
      transition: var(--transition);
    }
    
    .nav-link:hover:after, .nav-link.active:after {
      width: 70%;
      left: 15%;
    }
    
    .dropdown-menu {
      background-color: white;
      border: none;
      border-radius: var(--border-radius);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      padding: 0.5rem;
    }
    
    .dropdown-item {
      padding: 0.7rem 1rem;
      border-radius: 6px;
      transition: var(--transition);
      color: var(--dark-text);
      font-weight: 500;
    }
    
    .dropdown-item:hover {
      background-color: var(--light-bg);
      color: var(--primary-color);
    }
    
    /* Notification Icon */
    .notification-icon {
      position: relative;
      margin-right: 1.5rem;
    }
    
    .notification-icon a {
      color: white;
      font-size: 1.2rem;
      transition: var(--transition);
    }
    
    .notification-icon a:hover {
      color: var(--accent-color);
    }
    
    .notification-badge {
      position: absolute;
      top: -8px;
      right: -8px;
      background-color: var(--danger-color);
      color: white;
      border-radius: 50%;
      width: 18px;
      height: 18px;
      font-size: 0.7rem;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    /* Market Ticker */
    .market-ticker {
      background-color: var(--secondary-color);
      color: white;
      padding: 0.6rem 0;
      display: flex;
      justify-content: space-around;
      align-items: center;
      font-size: 0.9rem;
      font-weight: 500;
      position: fixed;
      top: 70px;
      width: 100%;
      z-index: 99;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .market-ticker div {
      display: flex;
      align-items: center;
    }
    
    .up {
      color: var(--accent-color);
      margin-left: 0.3rem;
      display: flex;
      align-items: center;
    }
    
    .down {
      color: var(--danger-color);
      margin-left: 0.3rem;
      display: flex;
      align-items: center;
    }
    
    /* User dropdown */
    #navbarDropdown {
      display: flex;
      align-items: center;
    }
    
    .dropdown-menu-end {
      border-radius: var(--border-radius);
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
      .navbar-collapse {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
        padding: 1rem;
        border-radius: 0 0 var(--border-radius) var(--border-radius);
        margin-top: 0.5rem;
      }
      
      .market-ticker {
        flex-wrap: wrap;
        justify-content: center;
        gap: 1rem;
        padding: 0.5rem;
        top: 66px;
      }
      
      .market-ticker div {
        margin: 0 0.5rem;
      }
    }
    
    /* Animation for navbar */
    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .navbar {
      animation: slideIn 0.5s ease;
    }
  </style>
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
          <li class="nav-item"><a class="nav-link active" href="/home">Home</a></li>
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
          <li class="nav-item"><a class="nav-link" href="{{ route('users.create') }}">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">List</a></li>
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

  <!-- Bootstrap & other scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Add subtle animation to market ticker items
    document.addEventListener('DOMContentLoaded', function() {
      const tickerItems = document.querySelectorAll('.market-ticker div');
      
      tickerItems.forEach((item, index) => {
        // Add delay for each item
        item.style.animation = `slideIn 0.5s ease ${index * 0.2}s both`;
      });
      
      // Add hover effect to notification icon
      const notificationIcon = document.querySelector('.notification-icon');
      notificationIcon.addEventListener('mouseenter', function() {
        this.querySelector('a').style.color = '#22c55e';
      });
      
      notificationIcon.addEventListener('mouseleave', function() {
        this.querySelector('a').style.color = 'white';
      });
    });
  </script>
</body>
</html>