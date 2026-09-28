<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details</title>
  <script>document.documentElement.setAttribute('data-bs-theme', localStorage.getItem('theme') || 'light');</script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>

  <?php require_once __DIR__ . '/../components/header.php'; ?>

  <main class="container py-5">
    <div class="row g-5 align-items-center">
      <div class="col-md-6">
    <img src="../public/images/item1.jpg" class="img-fluid rounded shadow" alt="Laptop Pro 14 on a wooden desk">
      </div>
      <div class="col-md-6">
        <span class="badge bg-primary mb-2">Category: Laptops</span>
        <h1 class="fw-bold">Laptop Pro 14</h1>
        <h3 class="text-danger my-3">$1,299</h3>
        <p class="text-muted leading-relaxed">
          A powerful laptop with a sharp display, fast performance and all-day battery life.
          Perfect for work, study and entertainment.
        </p>
        
        <!-- Button calls the JavaScript function showMessage() on click -->
        <button class="btn btn-success btn-lg px-5 mt-3" type="button" onclick="showMessage()">
          Add to Cart
        </button>
      </div>
    </div>
  </main>

  <?php require_once __DIR__ . '/../components/footer.php'; ?>

  <script src="../public/js/script.js"></script>
</body>
</html>
