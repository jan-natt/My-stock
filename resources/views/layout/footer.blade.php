<!-- Footer -->
<footer class="footer bg-dark text-light pt-5 pb-3 mt-5">
  <div class="container">
    <div class="row gy-4">
      
      <!-- Brand -->
      <div class="col-md-4">
        <h5 class="fw-bold mb-3">
          <i class="fas fa-chart-line text-success me-2"></i> StockPro
        </h5>
        <p class="small text-muted">
          Your trusted platform for real-time stock insights, IPO tracking, and investment opportunities.
        </p>
        <div class="d-flex gap-3 mt-3">
          <a href="#" class="text-light"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-light"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-light"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="text-light"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      
      <!-- Quick Links -->
      <div class="col-md-2">
        <h6 class="fw-bold mb-3">Quick Links</h6>
        <ul class="list-unstyled small">
          <li><a href="/" class="text-muted text-decoration-none">Home</a></li>
          <li><a href="/about" class="text-muted text-decoration-none">About</a></li>
          <li><a href="/market" class="text-muted text-decoration-none">Market</a></li>
          <li><a href="/pricing" class="text-muted text-decoration-none">Pricing</a></li>
          <li><a href="/contact" class="text-muted text-decoration-none">Contact</a></li>
        </ul>
      </div>

      <!-- IPO Links -->
      <div class="col-md-3">
        <h6 class="fw-bold mb-3">IPO Listings</h6>
        <ul class="list-unstyled small">
          <li><a href="/ipo/upcoming" class="text-muted text-decoration-none">Upcoming IPOs</a></li>
          <li><a href="/ipo/ongoing" class="text-muted text-decoration-none">Ongoing IPOs</a></li>
          <li><a href="/ipo/closed" class="text-muted text-decoration-none">Closed IPOs</a></li>
        </ul>
      </div>

      <!-- Newsletter -->
      <div class="col-md-3">
        <h6 class="fw-bold mb-3">Stay Updated</h6>
        <form>
          <div class="input-group">
            <input type="email" class="form-control form-control-sm" placeholder="Your email">
            <button class="btn btn-success btn-sm" type="submit">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <hr class="my-4 border-secondary">

    <div class="text-center small text-muted">
      &copy; <span id="year"></span> StockPro. All rights reserved.
    </div>
  </div>
</footer>

<script>
  // Auto update year
  document.getElementById("year").textContent = new Date().getFullYear();
</script>
</body>
</html>
