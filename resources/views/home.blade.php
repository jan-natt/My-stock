@extends('layout.main')

@section('content')
    <!-- Market Overview Navbar (Homepage Only) -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4">
    <div class="container-fluid d-flex justify-content-center">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#marketNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse justify-content-center" id="marketNavbar">
            <ul class="navbar-nav mb-2 mb-lg-0">
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


   <div class="container my-5">

    <!-- Hero Section -->
    <div class="text-center py-5">
        <h1 class="display-4 fw-bold fade-in">📈 Market Overview</h1>
        <p class="lead fade-in-delay">Stay updated with live prices, top gainers, losers, and global market trends.</p>
    </div>

    <!-- Live Bitcoin Price -->
    <div class="row mb-4 text-center">
        <div class="col-md-12">
            <div class="card shadow-sm scale-up">
                <div class="card-body">
                    <h5 class="card-title">Bitcoin Price (Live)</h5>
                    <h2 id="btc-price" class="fw-bold text-success">Loading...</h2>
                    <p class="text-muted">Updated every few seconds</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Market Index Cards -->
    <div class="row mb-5 text-center">
        @foreach(['S&P 500','NASDAQ','Dow Jones','FTSE 100'] as $index)
        <div class="col-md-3 mb-3">
            <div class="card glow-hover">
                <div class="card-body">
                    <h6 class="text-muted">{{ $index }}</h6>
                    <h4 class="fw-bold text-primary">$ {{ rand(3000,15000) }}</h4>
                    <p class="text-success">+{{ rand(0,3) }}.% Today</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Top Gainers & Losers -->
    <div class="row mb-5">
        <div class="col-md-6">
            <h3 class="mb-3">🚀 Top Gainers</h3>
            <table class="table table-striped fade-in-delay">
                <thead>
                    <tr><th>Stock</th><th>Price</th><th>Change</th></tr>
                </thead>
                <tbody>
                    <tr><td>TSLA</td><td>$250</td><td class="text-success">+5.2%</td></tr>
                    <tr><td>AMZN</td><td>$140</td><td class="text-success">+3.9%</td></tr>
                    <tr><td>NVDA</td><td>$490</td><td class="text-success">+2.7%</td></tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3 class="mb-3">📉 Top Losers</h3>
            <table class="table table-striped fade-in-delay">
                <thead>
                    <tr><th>Stock</th><th>Price</th><th>Change</th></tr>
                </thead>
                <tbody>
                    <tr><td>MSFT</td><td>$310</td><td class="text-danger">-2.1%</td></tr>
                    <tr><td>GOOGL</td><td>$128</td><td class="text-danger">-1.7%</td></tr>
                    <tr><td>FB</td><td>$280</td><td class="text-danger">-3.4%</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Crypto Live Ticker -->
    <div class="marquee-container mb-5">
        <div class="marquee">
            <span>BTC: $26,300 ▲ | ETH: $1,750 ▲ | XRP: $0.45 ▼ | SOL: $22.5 ▲ | DOGE: $0.075 ▼ </span>
        </div>
    </div>

    <!-- Interactive Chart Placeholder -->
    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h3 class="mb-3">📊 Bitcoin 7-Day Trend</h3>
            <canvas id="btcChart" height="100"></canvas>
        </div>
    </div>

    <!-- Market News Feed -->
    <div class="mb-5">
        <h3 class="mb-3">📰 Latest Market News</h3>
        <ul class="list-group fade-in-delay">
            <li class="list-group-item">Tesla stocks rally after AI announcement</li>
            <li class="list-group-item">Bitcoin crosses $26,000 amid global uncertainty</li>
            <li class="list-group-item">Amazon reports record quarterly revenue</li>
        </ul>
    </div>

    <!-- Call to Action -->
    <div class="text-center py-5">
        <h2 class="fw-bold mb-3">Ready to Trade?</h2>
        <a href="/register" class="btn btn-lg btn-success pulse">Join Now</a>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Fake BTC price fetch
function updateBTC() {
    document.getElementById("btc-price").innerText = "$" + (26000 + Math.floor(Math.random()*500));
}
setInterval(updateBTC, 3000);
updateBTC();

// Chart.js Example
const ctx = document.getElementById('btcChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
        datasets: [{
            label: 'BTC Price',
            data: [26000,26200,25900,26300,26500,26800,26600],
            borderColor: '#28a745',
            tension: 0.4
        }]
    },
    options: { responsive: true, animation: { duration: 1500 } }
});
</script>
@endpush


