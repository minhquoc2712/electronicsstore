<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Electronics Store</title>
  <!-- Apply saved theme before the page renders (prevents a white flash) -->
  <script>document.documentElement.setAttribute('data-bs-theme', localStorage.getItem('theme') || 'light');</script>
  <!-- Bootstrap CSS (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom stylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- Include header and navigation -->
  <?php require_once __DIR__ . '/../components/header.php'; ?>

  <main>
    <!-- Hero section -->
    <section class="py-5 bg-light text-center hero-section">
      <div class="container">
        <h1 class="display-4 fw-bold">The World of Premium Technology</h1>
        <p class="lead">Explore the latest electronic devices of 2026 with amazing deals.</p>
        <a href="#products" class="btn btn-primary btn-lg">Shop Now</a>
      </div>
    </section>

    <!-- Challenge C: featured item -->
    <section id="featured" class="container pt-5">
      <div class="card featured-card overflow-hidden">
        <div class="row g-0 align-items-center">
          <div class="col-md-5">
            <img src="images/item1.jpg" class="img-fluid featured-img" alt="Laptop Pro 14 on a wooden desk">
          </div>
          <div class="col-md-7 p-4 p-lg-5">
            <span class="badge bg-warning text-dark mb-2">Featured Item</span>
            <h2 class="fw-bold">Laptop Pro 14</h2>
            <p class="lead">Our best seller: sharp display, powerful performance and all-day battery life.</p>
            <p class="fs-3 fw-bold text-danger">$1,299</p>
            <a href="../pages/item_details.php" class="btn btn-primary btn-lg">View Details</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Product catalog: 6 items -->
    <section id="products" class="container py-5">
      <h2 class="text-center mb-4">Featured Products</h2>

      <!-- Challenge A: search box -->
      <div id="search" class="row mb-4">
        <div class="col-md-6 mx-auto">
          <input type="search" id="searchInput" class="form-control form-control-lg"
                 placeholder="Search products..." aria-label="Search products">
        </div>
      </div>

      <?php
      $products = [
        ['name' => 'Laptop Pro 14',       'category' => 'Laptops',     'desc' => 'Sharp display and powerful performance for work.', 'price' => '$1,299', 'img' => 'item1.jpg', 'alt' => 'Laptop Pro 14 on a wooden desk'],
        ['name' => 'SmartX Phone',        'category' => 'Phones',      'desc' => 'High-quality camera and all-day battery life.',    'price' => '$899',   'img' => 'item2.jpg', 'alt' => 'SmartX Phone showing colorful app icons'],
        ['name' => 'Wireless Headphones', 'category' => 'Audio',       'desc' => 'Immersive sound with a stylish design.',           'price' => '$199',   'img' => 'item3.jpg', 'alt' => 'Pink wireless headphones'],
        ['name' => 'Smart Watch',         'category' => 'Wearables',   'desc' => 'Track your health and get handy notifications.',   'price' => '$349',   'img' => 'item4.jpg', 'alt' => 'Smart watch on a wrist'],
        ['name' => 'Mirrorless Camera',   'category' => 'Cameras',     'desc' => 'Professional photos in a compact body.',           'price' => '$1,099', 'img' => 'item5.jpg', 'alt' => 'Mirrorless camera with lens'],
        ['name' => 'Mechanical Keyboard', 'category' => 'Accessories', 'desc' => 'Smooth typing with customizable backlight.',       'price' => '$129',   'img' => 'item6.jpg', 'alt' => 'Mechanical keyboard with backlight'],
      ];
      ?>

      <!-- Challenge B: category filter buttons -->
      <div class="d-flex flex-wrap justify-content-center gap-2 mb-5" id="categoryFilters">
        <button type="button" class="btn btn-primary category-btn active" data-category="all">All</button>
        <?php foreach ($products as $c): ?>
          <button type="button" class="btn btn-outline-primary category-btn"
                  data-category="<?php echo strtolower($c['category']); ?>"><?php echo $c['category']; ?></button>
        <?php endforeach; ?>
      </div>

      <div class="row g-4">
        <?php foreach ($products as $p): ?>
          <div class="col-12 col-md-6 col-lg-4 product-item"
               data-name="<?php echo strtolower($p['name']); ?>"
               data-category="<?php echo strtolower($p['category']); ?>">
            <div class="card h-100 product-card">
              <img src="images/<?php echo $p['img']; ?>" class="card-img-top" alt="<?php echo $p['alt']; ?>">
              <div class="card-body">
                <span class="badge bg-secondary mb-2"><?php echo $p['category']; ?></span>
                <h5 class="card-title"><?php echo $p['name']; ?></h5>
                <p class="card-text"><?php echo $p['desc']; ?></p>
                <p class="fw-bold text-danger fs-5"><?php echo $p['price']; ?></p>
                <div class="d-flex gap-2">
                  <a href="../pages/item_details.php" class="btn btn-outline-primary">View Details</a>
                  <!-- Challenge E: favorite toggle -->
                  <button type="button" class="btn btn-outline-danger fav-btn"
                          data-name="<?php echo $p['name']; ?>"
                          aria-pressed="false"
                          aria-label="Add <?php echo $p['name']; ?> to favorites">&#9825;</button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Shown when no product matches -->
      <p id="noResult" class="text-center text-muted fs-5 mt-4 d-none">No products found.</p>
    </section>
  </main>

  <!-- Include footer -->
  <?php require_once __DIR__ . '/../components/footer.php'; ?>

  <!-- Custom JavaScript -->
  <script src="js/script.js"></script>

</body>
</html>