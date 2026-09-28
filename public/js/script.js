// ---------- Helpers: safe localStorage access ----------
function loadValue(key, fallback) {
  try {
    var v = localStorage.getItem(key);
    return v === null ? fallback : v;
  } catch (e) {
    return fallback;
  }
}
function saveValue(key, value) {
  try { localStorage.setItem(key, value); } catch (e) { /* ignore */ }
}

// ---------- Task 11 + Challenge E: Add to Cart ----------
function updateCartBadge() {
  var badge = document.getElementById('cartCount');
  if (badge) badge.textContent = loadValue('cartCount', '0');
}

function showMessage() {
  var count = parseInt(loadValue('cartCount', '0'), 10) + 1;
  saveValue('cartCount', String(count));
  updateCartBadge();
  alert("Item added to your selection.");
}

document.addEventListener('DOMContentLoaded', function () {

  updateCartBadge();

  // ---------- Challenge D: dark / light mode ----------
  var root = document.documentElement;
  var themeBtn = document.getElementById('themeToggle');

  function applyTheme(theme) {
    root.setAttribute('data-bs-theme', theme);
    saveValue('theme', theme);
    if (themeBtn) themeBtn.textContent = theme === 'dark' ? 'Light mode' : 'Dark mode';
  }

  applyTheme(root.getAttribute('data-bs-theme') || 'light');

  if (themeBtn) {
    themeBtn.addEventListener('click', function () {
      applyTheme(root.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark');
    });
  }

  // ---------- Challenge A + B: search and category filter ----------
  var input = document.getElementById('searchInput');
  var noResult = document.getElementById('noResult');
  var items = document.querySelectorAll('.product-item');
  var categoryBtns = document.querySelectorAll('.category-btn');
  var currentCategory = 'all';

  function applyFilters() {
    var keyword = input ? input.value.trim().toLowerCase() : '';
    var visible = 0;

    items.forEach(function (item) {
      var matchName = item.dataset.name.includes(keyword);
      var matchCategory = currentCategory === 'all' || item.dataset.category === currentCategory;
      var show = matchName && matchCategory;
      item.style.display = show ? '' : 'none';
      if (show) visible++;
    });

    if (noResult) noResult.classList.toggle('d-none', visible > 0);
  }

  if (input) input.addEventListener('input', applyFilters);

  categoryBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      currentCategory = btn.dataset.category;
      categoryBtns.forEach(function (b) {
        var active = b === btn;
        b.classList.toggle('active', active);
        b.classList.toggle('btn-primary', active);
        b.classList.toggle('btn-outline-primary', !active);
      });
      applyFilters();
    });
  });

  // ---------- Challenge E: favorite toggle ----------
  var favorites = [];
  try { favorites = JSON.parse(loadValue('favorites', '[]')); } catch (e) { favorites = []; }

  function renderFav(btn, isFav) {
    btn.innerHTML = isFav ? '&#9829;' : '&#9825;';
    btn.classList.toggle('btn-danger', isFav);
    btn.classList.toggle('btn-outline-danger', !isFav);
    btn.setAttribute('aria-pressed', isFav ? 'true' : 'false');
  }

  document.querySelectorAll('.fav-btn').forEach(function (btn) {
    var name = btn.dataset.name;
    renderFav(btn, favorites.indexOf(name) !== -1);

    btn.addEventListener('click', function () {
      var idx = favorites.indexOf(name);
      if (idx === -1) favorites.push(name); else favorites.splice(idx, 1);
      saveValue('favorites', JSON.stringify(favorites));
      renderFav(btn, idx === -1);
    });
  });
});