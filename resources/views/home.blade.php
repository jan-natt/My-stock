@extends('layout.main')

@section('content')
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StockPro - Market Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #2563eb;
            --secondary: #0f172a;
            --accent: #22c55e;
            --danger: #ef4444;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray: #64748b;
            --border-radius: 12px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f5f9;
            color: var(--dark);
            padding-top: 20px;
        }
        
        /* Header Styles */
        .market-nav {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary) 100%);
            border-radius: var(--border-radius);
            padding: 0.8rem 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--box-shadow);
        }
        
        .market-nav .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: var(--transition);
        }
        
        .market-nav .nav-link:hover, .market-nav .nav-link.active {
            background: rgba(255, 255, 255, 0.15);
            color: white !important;
        }
        
        /* Card Styles */
        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            margin-bottom: 1.5rem;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 600;
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
        }
        
        /* Hero Section */
        .hero-section {
            text-align: center;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }
        
        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--gray);
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* Bitcoin Price Card */
        .btc-card {
            background: linear-gradient(135deg, var(--secondary) 0%, #3b0764 100%);
            color: white;
            overflow: hidden;
            position: relative;
        }
        
        .btc-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        }
        
        .btc-price {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
        }
        
        .price-update-time {
            font-size: 0.8rem;
            opacity: 0.8;
        }
        
        /* Index Cards */
        .index-card {
            text-align: center;
            padding: 1.5rem;
            height: 100%;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .index-card:hover {
            transform: scale(1.03);
        }
        
        .index-name {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        .index-value {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .index-change {
            font-weight: 600;
        }
        
        /* Table Styles */
        .table-container {
            border-radius: var(--border-radius);
            overflow: hidden;
        }
        
        .table th {
            background-color: #f8fafc;
            font-weight: 600;
            padding: 1rem;
        }
        
        .table td {
            padding: 1rem;
            vertical-align: middle;
        }
        
        .stock-symbol {
            font-weight: 600;
        }
        
        .change-positive {
            color: var(--accent);
            font-weight: 600;
        }
        
        .change-negative {
            color: var(--danger);
            font-weight: 600;
        }
        
        /* Crypto Ticker */
        .crypto-ticker {
            background: var(--dark);
            color: white;
            padding: 1rem;
            border-radius: var(--border-radius);
            overflow: hidden;
            position: relative;
        }
        
        .ticker-content {
            display: flex;
            animation: ticker-scroll 30s linear infinite;
            white-space: nowrap;
        }
        
        .ticker-item {
            margin-right: 3rem;
            display: inline-block;
        }
        
        @keyframes ticker-scroll {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        
        /* Chart Container */
        .chart-container {
            padding: 1.5rem;
            height: 300px;
        }
        
        /* News Styles */
        .news-item {
            border-left: 3px solid var(--primary);
            padding-left: 1rem;
            margin-bottom: 1rem;
            transition: var(--transition);
            cursor: pointer;
        }
        
        .news-item:hover {
            border-left: 3px solid var(--accent);
            background-color: #f8fafc;
            transform: translateX(5px);
        }
        
        /* CTA Button */
        .cta-button {
            background: linear-gradient(135deg, var(--accent) 0%, #16a34a 100%);
            border: none;
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            box-shadow: 0 10px 20px rgba(34, 197, 94, 0.3);
            transition: var(--transition);
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(34, 197, 94, 0.4);
        }
        
        /* Loading Animation */
        .loading {
            position: relative;
            overflow: hidden;
        }
        
        .loading::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            transform: translateX(-100%);
            background: linear-gradient(
                90deg,
                rgba(255, 255, 255, 0) 0,
                rgba(255, 255, 255, 0.2) 20%,
                rgba(255, 255, 255, 0.5) 60%,
                rgba(255, 255, 255, 0)
            );
            animation: shimmer 2s infinite;
        }
        
        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 1s ease;
        }
        
        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }
        .delay-3 { animation-delay: 0.6s; }
        
        /* Price change animations */
        @keyframes priceUp {
            0% { background-color: transparent; }
            50% { background-color: rgba(34, 197, 94, 0.2); }
            100% { background-color: transparent; }
        }
        
        @keyframes priceDown {
            0% { background-color: transparent; }
            50% { background-color: rgba(239, 68, 68, 0.2); }
            100% { background-color: transparent; }
        }
        
        .price-up {
            animation: priceUp 1s ease;
        }
        
        .price-down {
            animation: priceDown 1s ease;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.2rem;
            }
            
            .btc-price {
                font-size: 2rem;
            }
            
            .index-value {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <!-- Market Overview Navbar -->
        <nav class="navbar navbar-expand-lg market-nav">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#marketNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="marketNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#"><i class="fas fa-chart-area me-2"></i> Market Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fab fa-bitcoin me-2 text-warning"></i> BTC: 
                                <span id="nav-btc-price" class="text-success">$62,384 <i class="fas fa-arrow-up"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="gainers"><i class="fas fa-arrow-trend-up text-success me-2"></i> Top Gainers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-arrow-trend-down text-danger me-2"></i> Top Losers</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="hero-section fade-in">
            <h1 class="hero-title">Market Overview</h1>
            <p class="hero-subtitle">Stay updated with live prices, top gainers, losers, and global market trends</p>
        </div>

        <!-- Live Bitcoin Price -->
        <div class="row mb-4 fade-in delay-1">
            <div class="col-12">
                <div class="card btc-card">
                    <div class="card-body text-center p-4">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <i class="fab fa-bitcoin fa-2x text-warning me-3"></i>
                            <h5 class="card-title mb-0 text-white">Bitcoin Price (Live)</h5>
                        </div>
                        <h2 id="btc-price" class="btc-price">Loading...</h2>
                        <p class="text-light mb-0">Updated: <span id="btc-update-time">Just now</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Market Index Cards -->
        <div class="row mb-5 fade-in delay-2" id="index-cards">
            <!-- Index cards will be dynamically loaded here -->
        </div>

        <!-- Top Gainers & Losers -->
        <div class="row mb-5 fade-in delay-2">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fas fa-arrow-trend-up text-success me-2"></i>
                            <span>Top Gainers</span>
                        </div>
                        <button class="btn btn-sm btn-outline-success" onclick="refreshGainers()">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                    <div class="table-container">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Change</th>
                                </tr>
                            </thead>
                            <tbody id="gainers-table">
                                <!-- Gainers will be dynamically loaded here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fas fa-arrow-trend-down text-danger me-2"></i>
                            <span>Top Losers</span>
                        </div>
                        <button class="btn btn-sm btn-outline-danger" onclick="refreshLosers()">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                    <div class="table-container">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Change</th>
                                </tr>
                            </thead>
                            <tbody id="losers-table">
                                <!-- Losers will be dynamically loaded here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Crypto Live Ticker -->
        <div class="card crypto-ticker mb-5 fade-in delay-3">
            <div class="ticker-content" id="crypto-ticker">
                <!-- Crypto data will be dynamically loaded here -->
            </div>
        </div>

        <!-- Interactive Chart -->
        <div class="card mb-5 fade-in delay-3">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    <i class="fas fa-chart-line me-2"></i>
                    <span>Bitcoin 7-Day Trend</span>
                </div>
                <div>
                    <select class="form-select form-select-sm" id="chart-range" onchange="updateChart()">
                        <option value="7">7 Days</option>
                        <option value="30">30 Days</option>
                        <option value="90">90 Days</option>
                    </select>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="btcChart"></canvas>
            </div>
        </div>

        <!-- Market News Feed -->
        <div class="card mb-5 fade-in">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    <i class="fas fa-newspaper me-2"></i>
                    <span>Latest Market News</span>
                </div>
                <button class="btn btn-sm btn-outline-primary" onclick="loadNews()">
                    <i class="fas fa-sync-alt"></i>
                </button>
            </div>
            <div class="card-body" id="news-container">
                <!-- News will be dynamically loaded here -->
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center py-5 fade-in">
            <h2 class="fw-bold mb-3">Ready to Trade?</h2>
            <p class="text-muted mb-4">Join thousands of investors who trust StockPro for their trading needs</p>
            <button class="cta-button text-white" onclick="window.location.href='/register'">Get Started Today</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Global variables
        let btcPrice = 62384;
        let btcChartInstance = null;
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            loadAllData();
            setInterval(updateAllData, 30000); // Update every 30 seconds
        });
        
        // Load all initial data
        function loadAllData() {
            updateBTCPrice();
            loadMarketIndices();
            loadGainers();
            loadLosers();
            loadCryptoTicker();
            initializeChart();
            loadNews();
            
            // Add animation class to elements on scroll
            const animatedElements = document.querySelectorAll('.fade-in');
            
            animatedElements.forEach(element => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                element.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            });
            
            setTimeout(() => {
                animatedElements.forEach(element => {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                });
            }, 100);
        }
        
        // Update all data
        function updateAllData() {
            updateBTCPrice();
            updateMarketIndices();
            updateGainers();
            updateLosers();
            updateCryptoTicker();
            updateNews();
        }
        
        // Fetch BTC price from API (simulated)
        function updateBTCPrice() {
            // In a real app, you would fetch from an API like:
            // fetch('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd')
            
            // Simulating API call with random price changes
            const change = (Math.random() - 0.5) * 1000;
            const newPrice = btcPrice + change;
            const changePercent = ((newPrice - btcPrice) / btcPrice * 100).toFixed(2);
            
            const btcElement = document.getElementById("btc-price");
            const navBtcElement = document.getElementById("nav-btc-price");
            const updateTimeElement = document.getElementById("btc-update-time");
            
            const formattedPrice = newPrice.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            
            // Add animation class based on price direction
            if (newPrice > btcPrice) {
                btcElement.classList.add('price-up');
                navBtcElement.innerHTML = `${formattedPrice} <i class="fas fa-arrow-up"></i>`;
                navBtcElement.className = 'text-success';
            } else if (newPrice < btcPrice) {
                btcElement.classList.add('price-down');
                navBtcElement.innerHTML = `${formattedPrice} <i class="fas fa-arrow-down"></i>`;
                navBtcElement.className = 'text-danger';
            }
            
            // Remove animation class after animation completes
            setTimeout(() => {
                btcElement.classList.remove('price-up', 'price-down');
            }, 1000);
            
            btcElement.innerHTML = formattedPrice;
            btcPrice = newPrice;
            
            // Update timestamp
            updateTimeElement.textContent = new Date().toLocaleTimeString();
        }
        
        // Load market indices (simulated)
        function loadMarketIndices() {
            const indices = [
                { name: 'S&P 500', value: 4891.23, change: 1.2 },
                { name: 'NASDAQ', value: 15294.84, change: 0.8 },
                { name: 'Dow Jones', value: 38621.05, change: -0.3 },
                { name: 'FTSE 100', value: 7632.45, change: 0.5 }
            ];
            
            const container = document.getElementById('index-cards');
            container.innerHTML = '';
            
            indices.forEach(index => {
                const changeClass = index.change >= 0 ? 'text-success' : 'text-danger';
                const changeIcon = index.change >= 0 ? 'fa-arrow-up' : 'fa-arrow-down';
                
                const card = document.createElement('div');
                card.className = 'col-md-3 col-sm-6 mb-3';
                card.innerHTML = `
                    <div class="card index-card" onclick="showIndexDetails('${index.name}')">
                        <h6 class="index-name">${index.name}</h6>
                        <h4 class="index-value text-primary">$${index.value.toLocaleString()}</h4>
                        <p class="index-change ${changeClass}">
                            <i class="fas ${changeIcon}"></i> ${Math.abs(index.change)}%
                        </p>
                    </div>
                `;
                
                container.appendChild(card);
            });
        }
        
        // Update market indices with random changes
        function updateMarketIndices() {
            const indexCards = document.querySelectorAll('.index-card');
            
            indexCards.forEach(card => {
                const changeElement = card.querySelector('.index-change');
                const valueElement = card.querySelector('.index-value');
                
                const currentValue = parseFloat(valueElement.textContent.replace('$', '').replace(',', ''));
                const change = (Math.random() - 0.5) * 2;
                const newValue = currentValue * (1 + change/100);
                
                valueElement.textContent = `$${newValue.toLocaleString(undefined, {maximumFractionDigits: 2})}`;
                
                if (change >= 0) {
                    changeElement.className = 'index-change text-success';
                    changeElement.innerHTML = `<i class="fas fa-arrow-up"></i> ${change.toFixed(2)}%`;
                } else {
                    changeElement.className = 'index-change text-danger';
                    changeElement.innerHTML = `<i class="fas fa-arrow-down"></i> ${Math.abs(change).toFixed(2)}%`;
                }
            });
        }
        
        // Load top gainers (simulated)
        function loadGainers() {
            const gainers = [
                { symbol: 'TSLA', price: 250.75, change: 5.2 },
                { symbol: 'AMZN', price: 140.32, change: 3.9 },
                { symbol: 'NVDA', price: 490.56, change: 2.7 }
            ];
            
            const table = document.getElementById('gainers-table');
            table.innerHTML = '';
            
            gainers.forEach(stock => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><span class="stock-symbol">${stock.symbol}</span></td>
                    <td>$${stock.price.toFixed(2)}</td>
                    <td class="change-positive">+${stock.change.toFixed(1)}%</td>
                `;
                table.appendChild(row);
            });
        }
        
        // Update gainers with random changes
        function updateGainers() {
            const rows = document.querySelectorAll('#gainers-table tr');
            
            rows.forEach(row => {
                const priceCell = row.cells[1];
                const changeCell = row.cells[2];
                
                const currentPrice = parseFloat(priceCell.textContent.replace('$', ''));
                const change = Math.random() * 3;
                const newPrice = currentPrice * (1 + change/100);
                
                priceCell.textContent = `$${newPrice.toFixed(2)}`;
                changeCell.textContent = `+${change.toFixed(1)}%`;
                
                // Add animation
                changeCell.classList.add('price-up');
                setTimeout(() => {
                    changeCell.classList.remove('price-up');
                }, 1000);
            });
        }
        
        // Refresh gainers table
        function refreshGainers() {
            const button = event.currentTarget;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            
            setTimeout(() => {
                loadGainers();
                button.innerHTML = '<i class="fas fa-sync-alt"></i>';
            }, 1000);
        }
        
        // Load top losers (simulated)
        function loadLosers() {
            const losers = [
                { symbol: 'MSFT', price: 310.45, change: -2.1 },
                { symbol: 'GOOGL', price: 128.92, change: -1.7 },
                { symbol: 'META', price: 280.67, change: -3.4 }
            ];
            
            const table = document.getElementById('losers-table');
            table.innerHTML = '';
            
            losers.forEach(stock => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><span class="stock-symbol">${stock.symbol}</span></td>
                    <td>$${stock.price.toFixed(2)}</td>
                    <td class="change-negative">${stock.change.toFixed(1)}%</td>
                `;
                table.appendChild(row);
            });
        }
        
        // Update losers with random changes
        function updateLosers() {
            const rows = document.querySelectorAll('#losers-table tr');
            
            rows.forEach(row => {
                const priceCell = row.cells[1];
                const changeCell = row.cells[2];
                
                const currentPrice = parseFloat(priceCell.textContent.replace('$', ''));
                const change = -Math.random() * 3;
                const newPrice = currentPrice * (1 + change/100);
                
                priceCell.textContent = `$${newPrice.toFixed(2)}`;
                changeCell.textContent = `${change.toFixed(1)}%`;
                
                // Add animation
                changeCell.classList.add('price-down');
                setTimeout(() => {
                    changeCell.classList.remove('price-down');
                }, 1000);
            });
        }
        
        // Refresh losers table
        function refreshLosers() {
            const button = event.currentTarget;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            
            setTimeout(() => {
                loadLosers();
                button.innerHTML = '<i class="fas fa-sync-alt"></i>';
            }, 1000);
        }
        
        // Load crypto ticker (simulated)
        function loadCryptoTicker() {
            const cryptos = [
                { symbol: 'BTC', price: 62384.21, change: 2.1 },
                { symbol: 'ETH', price: 3405.67, change: 1.5 },
                { symbol: 'XRP', price: 0.542, change: -0.8 },
                { symbol: 'SOL', price: 142.36, change: 3.2 },
                { symbol: 'ADA', price: 0.462, change: -1.2 },
                { symbol: 'DOT', price: 7.24, change: 0.7 }
            ];
            
            const container = document.getElementById('crypto-ticker');
            container.innerHTML = '';
            
            cryptos.forEach(crypto => {
                const changeClass = crypto.change >= 0 ? 'text-success' : 'text-danger';
                const changeIcon = crypto.change >= 0 ? 'fa-arrow-up' : 'fa-arrow-down';
                
                const item = document.createElement('span');
                item.className = 'ticker-item';
                item.innerHTML = `${crypto.symbol}: $${crypto.price.toLocaleString(undefined, {maximumFractionDigits: 2})} <i class="fas ${changeIcon} ${changeClass}"></i>`;
                
                container.appendChild(item);
            });
        }
        
        // Update crypto ticker with random changes
        function updateCryptoTicker() {
            const items = document.querySelectorAll('.ticker-item');
            
            items.forEach(item => {
                const text = item.textContent;
                const symbol = text.split(':')[0];
                const currentPrice = parseFloat(text.split('$')[1].split(' ')[0].replace(',', ''));
                
                const change = (Math.random() - 0.5) * 4;
                const newPrice = currentPrice * (1 + change/100);
                
                const changeClass = change >= 0 ? 'text-success' : 'text-danger';
                const changeIcon = change >= 0 ? 'fa-arrow-up' : 'fa-arrow-down';
                
                item.innerHTML = `${symbol}: $${newPrice.toLocaleString(undefined, {maximumFractionDigits: 2})} <i class="fas ${changeIcon} ${changeClass}"></i>`;
            });
        }
        
        // Initialize chart
        function initializeChart() {
            const ctx = document.getElementById('btcChart').getContext('2d');
            
            // Generate sample data
            const data = generateChartData(7);
            
            btcChartInstance = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'BTC Price',
                        data: data.prices,
                        borderColor: '#22c55e',
                        backgroundColor: 'rgba(34, 197, 94, 0.1)',
                        borderWidth: 3,
                        pointBackgroundColor: '#22c55e',
                        pointRadius: 4,
                        pointHoverRadius: 7,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    animation: {
                        duration: 1500,
                        easing: 'easeOutQuart'
                    }
                }
            });
        }
        
        // Update chart based on selected range
        function updateChart() {
            const range = document.getElementById('chart-range').value;
            const data = generateChartData(parseInt(range));
            
            btcChartInstance.data.labels = data.labels;
            btcChartInstance.data.datasets[0].data = data.prices;
            btcChartInstance.update();
        }
        
        // Generate chart data
        function generateChartData(days) {
            const labels = [];
            const prices = [];
            let currentPrice = btcPrice;
            
            // Generate dates for labels
            for (let i = days - 1; i >= 0; i--) {
                const date = new Date();
                date.setDate(date.getDate() - i);
                labels.push(date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' }));
            }
            
            // Generate price data
            for (let i = 0; i < days; i++) {
                if (i === 0) {
                    prices.push(currentPrice);
                } else {
                    const change = (Math.random() - 0.5) * 2000;
                    currentPrice += change;
                    prices.push(currentPrice);
                }
            }
            
            return { labels, prices };
        }
        
        // Load news (simulated)
        function loadNews() {
            const news = [
                { title: 'Tesla stocks rally after AI announcement', time: '2 hours ago' },
                { title: 'Bitcoin crosses $62,000 amid global uncertainty', time: '5 hours ago' },
                { title: 'Amazon reports record quarterly revenue', time: '1 day ago' }
            ];
            
            const container = document.getElementById('news-container');
            container.innerHTML = '';
            
            news.forEach(item => {
                const newsItem = document.createElement('div');
                newsItem.className = 'news-item';
                newsItem.innerHTML = `
                    <h6>${item.title}</h6>
                    <p class="text-muted mb-0">${item.time}</p>
                `;
                
                container.appendChild(newsItem);
            });
        }
        
        // Update news
        function updateNews() {
            // In a real app, you would fetch new news items from an API
            console.log('News updated');
        }
        
        // Refresh news
        function refreshNews() {
            const button = event.currentTarget;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            
            setTimeout(() => {
                loadNews();
                button.innerHTML = '<i class="fas fa-sync-alt"></i>';
            }, 1000);
        }
        
        // Show index details (placeholder)
        function showIndexDetails(indexName) {
            alert(`Details for ${indexName} would be shown here.`);
        }
    </script>
</body>
</html>


