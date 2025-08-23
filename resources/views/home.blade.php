@extends('layout.main')

@section('content')
    <!-- Market Overview Navbar (Homepage Only) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4 ">
    <div class="container-fluid d-flex ">
     <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#marketNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse " id="marketNavbar">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" href="#"><i class="fas fa-chart-area me-1"></i> Market Overview</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fab fa-bitcoin me-1 text-warning"></i> BTC:
                <span class="text-success">$62,384 <i class="fas fa-arrow-up"></i></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-arrow-trend-up text-success me-1"></i> Top Gainers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-arrow-trend-down text-danger me-1"></i> Top Losers</a>
            </li>
          </ul>  
        </div>
      </div>
    </nav>

    <!-- Rest of Homepage Content -->
    <div class="container">
        <h1 class="mb-4">Welcome to StockPro</h1>
        <p>Here you can see market trends, IPOs, gainers, and losers...</p>
    </div>
@endsection


