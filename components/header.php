<header>
  <!-- Dark Bootstrap navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="../public/index.php">Electronics Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto align-items-lg-center">
          <li class="nav-item"><a class="nav-link active" href="../public/index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="../public/index.php#products">Items</a></li>
          <li class="nav-item"><a class="nav-link" href="../public/index.php#search">Search</a></li>
          <li class="nav-item"><a class="nav-link" href="../public/index.php#contact">Contact</a></li>
          <!-- Challenge D: dark/light mode toggle -->
          <li class="nav-item ms-lg-3 my-2 my-lg-0">
            <button id="themeToggle" type="button" class="btn btn-outline-light btn-sm">Dark mode</button>
          </li>
          <!-- Challenge E: cart counter -->
          <li class="nav-item ms-lg-3">
            <span class="navbar-text text-white">Cart <span id="cartCount" class="badge bg-primary">0</span></span>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>