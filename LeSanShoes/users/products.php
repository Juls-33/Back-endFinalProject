<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basketball Shoes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
  <link rel="stylesheet" href="../assets/css/products.css"/>
  <style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
</style>
<link rel="stylesheet" href="productpage.css">
</head>

<body>
  <header>
    <div class="ad">
      <div class="ad-text">
        <h2>Limited Time Offer 20% off for All Shoes! Contact Us Now</h2>
      </div>
    </div>
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <div class="logo-class">
            <img src="../assets/images/sanshoes logo.png" alt="Bootstrap" width="100" height="100">
          </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="../users/index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
          </ul>
          <div class="d-lg-flex flex-lg-row align-items-center gap-2">
              <!-- <div><a href="../userAuth/login.php">Login</a></div>
              <p>Username: <?php echo isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : 'Not set'; ?></p>
              <a href="../userAuth/logoutUser.php">Logout</a> -->
              <div class="mb-2" role="button" data-bs-toggle="modal" data-bs-target="#userModal">
            <span class="material-symbols-outlined d-none d-lg-inline">account_circle</span>
            <span class="icon-text d-inline d-lg-none">User Account</span>
          </div>
            <div>
              <span class="material-symbols-outlined d-none d-lg-inline">shopping_cart</span>
              <span class="icon-text d-inline d-lg-none">Cart</span>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main>
     <div class="header">
   <div class="pic">
    <img src="../assets/images/jordan.jpg">
   </div>
  </div>


    <div class="container mt-4">  
      <div class="row">
        <!-- Filters -->
        <div class="col-md-3">
          <h4>Filters</h4>
          <div class="accordion" id="filtersAccordion">
          
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#filterActivity">
                  Activity
                </button>
              </h2>
              <div id="filterActivity" class="accordion-collapse collapse show">
                <div class="accordion-body">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="running" value="running"> <label for="running">Running</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="basketball" value="basketball"> <label for="basketball">Basketball</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="lifestyle" value="lifestyle"> <label for="lifestyle">Lifestyle</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#filterBrand">
                  Brand
                </button>
              </h2>
              <div id="filterBrand" class="accordion-collapse collapse show">
  <div class="accordion-body">
    <div class="form-check">
  <input class="form-check-input" type="checkbox" id="Anta" value="Anta">
  <label for="Anta">Anta</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="Nike" value="Nike">
  <label for="Nike">Nike</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="Under" value="Under Armour">
  <label for="Under">Under Armour</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="Adidas" value="Adidas">
  <label for="Adidas">Adidas</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="Asics" value="Asics">
  <label for="Asics">Asics</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="Jordan" value="Jordan">
  <label for="Jordan">Jordan</label>
</div>


  </div>
</div>
            </div>
          </div>
        </div>

        <!-- Product Display -->
        <div class="col-md-9">
          <h4>Shoes</h4>
          <input type="text" id="colorwaySearch" class="form-control mb-3" placeholder="Search products...">
          <div class="container mt-4">
            </div>
            <div class="row gy-4 card-container" id="cardContainer">
            
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Product Detail Modal -->
<div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productDetailModalLabel">Product Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <!-- We'll fill this dynamically -->
      </div>
    </div>
        <p><strong>Model:</strong> <span id="modalModelName"></span></p>
        <p><strong>Brand:</strong> <span id="modalBrandName"></span></p>
        <img id="modalImage" src="" class="img-fluid" alt="Shoe Image">
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
 <br> <br>
 <footer class="text-white text-center text-lg-start w-100" style="width: 100%; background-color: #B51E1E;">
    <div class="p-4" style="max-width: 100%;">
      <div class="d-flex flex-wrap justify-content-around text-start">
        <!-- Column 1 -->
        <div class="p-3" style="min-width: 250px; max-width: 300px;">
          <div class="shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto">
            <img src="../assets/images/sanshoes logo white.png" height="70" alt="" loading="lazy" />
          </div>
          <p class="text-center" style="color: white;">Find your perfect pair and step into comfort and style</p>
          <ul class="list-unstyled d-flex justify-content-center">
            <li><a class="text-white px-2" href="#"><i class="fab fa-facebook-square"></i></a></li>
            <li><a class="text-white px-2" href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a class="text-white px-2" href="#"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>
  
        <!-- Column 2 -->
        <div class="p-3" style="min-width: 250px; max-width: 300px;">
          <h5 class="text-uppercase mb-4">Products</h5>
          <ul>
            <li class="mb-2"><a href="#" class="text-white">Anta</a></li>
            <li class="mb-2"><a href="#" class="text-white">Nike</a></li>
            <li class="mb-2"><a href="#" class="text-white">Under Armour</a></li>
            <li class="mb-2"><a href="#" class="text-white">Adidas</a></li>
          </ul>
        </div>
  
        <!-- Column 3 -->
        <div class="p-3" style="min-width: 250px; max-width: 300px;">
          <h5 class="text-uppercase mb-4">Useful Links</h5>
          <ul>
            <li class="mb-2"><a href="index.php" class="text-white">Home</a></li>
            <li class="mb-2"><a href="#" class="text-white">Products</a></li>
            <li class="mb-2"><a href="faq.php" class="text-white">FAQ</a></li>
            <li class="mb-2"><a href="#" class="text-white">Cart</a></li>
          </ul>
        </div>
  
        <!-- Column 4 -->
        <div class="p-3" style="min-width: 250px; max-width: 300px;">
          <h5 class="text-uppercase mb-4">Contact</h5>
          <ul class="list-unstyled">
            <li><p class="text-white"><i class="fas fa-map-marker-alt pe-2"></i>Warsaw, 57 Street, Poland</p></li>
            <li><p class="text-white"><i class="fas fa-phone pe-2"></i>+ 01 234 567 89</p></li>
            <li><p class="text-white"><i class="fas fa-envelope pe-2 mb-0"></i>contact@example.com</p></li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">LeSanShoes.com</a>
    </div>
  </footer>
  <script src="productsPageMiddleware.js"></script>
  <script src="filters.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">User Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <?php if (isset($_SESSION["username"])): ?>
          <p>You are logged in as <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong></p>
          <a href="../userAuth/logoutUser.php" class="btn btn-danger">Logout</a>
        <?php else: ?>
          <p>You are not logged in.</p>
          <a href="../userAuth/login.php" class="btn btn-primary">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>


<!-- <script>
  // Wait for the page to load
  document.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);
    const brand = params.get("brand"); // Get the brand from the URL

    console.log("Brand from URL:", brand);  // Debugging line

    if (brand) {
      const decodedBrand = decodeURIComponent(brand);  // Decode the brand

      // Find the checkbox for that brand
      const checkbox = document.querySelector(`input[type="checkbox"][value="${decodedBrand}"]`);

      console.log("Found checkbox for brand:", decodedBrand);  // Debugging line

      if (checkbox) {
        checkbox.checked = true;  // Check the checkbox
        console.log("Checkbox is checked:", checkbox);  // Debugging line

        // Manually trigger the 'change' event to apply the filter
        $(checkbox).trigger('change');
      } else {
        console.warn("Checkbox not found for brand:", decodedBrand);  // Debugging line
      }
    } else {
      console.warn("No brand parameter in URL!");  // Debugging line
    }
  });
</script> -->
<!-- <script>
function getURLParameter(name) {
  return new URLSearchParams(window.location.search).get(name);
}

function applyURLFilters() {
  const brandFromURL = getURLParameter('brand');
  if (brandFromURL) {
    const brandCheckbox = $(`#${brandFromURL}`);
    if (brandCheckbox.length) {
      brandCheckbox.prop('checked', true);
    }
  }

  const categoryFromURL = getURLParameter('category');
  if (categoryFromURL) {
    const categoryCheckbox = $(`#${categoryFromURL}`);
    if (categoryCheckbox.length) {
      categoryCheckbox.prop('checked', true);
    }
  }

  // Call the filter after all checkbox states are set
  filterColorwaysAndCategories();
}

$(window).on('load', function () {
  applyURLFilters();
});
</script> -->
<script>
function getURLParameter(name) {
  return new URLSearchParams(window.location.search).get(name);
}

function applyURLFilters() {
  const brandFromURL = getURLParameter('brand');
  if (brandFromURL) {
    const checkbox = $(`#${brandFromURL}`);
    if (checkbox.length) {
      checkbox.prop('checked', true);
    }
  }

  const categoryFromURL = getURLParameter('category');
  if (categoryFromURL) {
    const checkbox = $(`#${categoryFromURL}`);
    if (checkbox.length) {
      checkbox.prop('checked', true);
    }
  }

  filterColorwaysAndCategories(); // Apply filter after checkboxes are set
}

function waitForColorwayCards(callback) {
  const container = document.querySelector('.colorway-card')?.parentElement;
  if (!container) {
    // Retry after short delay if elements not yet in DOM
    setTimeout(() => waitForColorwayCards(callback), 50);
    return;
  }

  // Run immediately if already present
  if (document.querySelector('.colorway-card')) {
    callback();
    return;
  }

  // Otherwise observe and run once they're added
  const observer = new MutationObserver((mutations, obs) => {
    if (document.querySelector('.colorway-card')) {
      obs.disconnect();
      callback();
    }
  });

  observer.observe(container, { childList: true, subtree: true });
}

$(document).ready(function () {
  waitForColorwayCards(applyURLFilters);
});
</script>


<script>
  $('#colorwaySearch').on('input', function () {
    const searchTerm = $(this).val().toLowerCase();
    $('.colorway-card').each(function () {
      const text = $(this).attr('data-search').toLowerCase();
      $(this).toggle(text.includes(searchTerm));  // Show or hide cards based on search
    });
  });

  function filterColorwaysAndCategories() {
  const selectedBrands = $('#Anta, #Nike, #Under, #Adidas, #Asics, #Jordan')
    .filter(':checked')
    .map(function () {
      return this.value.toLowerCase();
    }).get();

  const selectedCategories = $('#running, #basketball, #lifestyle')
    .filter(':checked')
    .map(function () {
      return this.value.toLowerCase();
    }).get();

  $('.colorway-card').each(function () {
    const text = $(this).attr('data-search').toLowerCase();

    const brandMatch = selectedBrands.length === 0 ? true : selectedBrands.some(brand => text.includes(brand));
    const categoryMatch = selectedCategories.length === 0 ? true : selectedCategories.some(category => text.includes(category));

    const matches = brandMatch && categoryMatch;
    $(this).toggle(matches);
  });
}

$('#Anta, #Nike, #Under, #Adidas, #Asics,#Jordan, #running, #basketball, #lifestyle')
  .on('change', filterColorwaysAndCategories);


</script>


</body>
</html>
