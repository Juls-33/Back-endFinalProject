console.log("JavaScript is running!");
$(document).ready(function() {
      try {
        $.ajax({
          url: 'TryLangAndrei.php',  
          method: 'POST',
          dataType: 'json',
          success: function(response) {
            let cardsHtml = '';
            response.shoe_models
              .sort((a, b) => {
                const stockA = parseInt(a.total_stock);
                const stockB = parseInt(b.total_stock);

                // In-stock items first (i.e., push stock = 0 to the bottom)
                if (stockA === 0 && stockB > 0) return 1;
                if (stockB === 0 && stockA > 0) return -1;
                return 0; // Leave order as-is if both are same stock status
              })
              .forEach(item => {
                const imgPath = item.image1 || 'assets/images/default.jpg';
                const isOutOfStock = parseInt(item.total_stock) === 0;

                const stockText = isOutOfStock
                  ? `<span class="text-danger">Out of Stock</span>`
                  : `<strong>₱ ${item.price}</strong>`;

                cardsHtml += `
  <div class="col-md-4 mb-4 colorway-card ${isOutOfStock ? 'grayed-out' : ''}"
      data-search="${item.model_name}${item.brand_name}${item.colorway_name}${item.price}${item.category_name}">
    <div class="card product-card h-100"
        style="width: 18rem; ${isOutOfStock ? 'opacity: 0.5; pointer-events: none;' : ''}"
        data-id="${item.colorway_id}">
      
      <div style="height: 200px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
        <img src="${imgPath}" class="card-img-top" alt="Shoe Image"
             style="height: 100%; width: auto; object-fit: contain;">
      </div>
      
      <div class="card-body p-2 text-center">
        <p class="card-text small">
          <strong>${item.brand_name}</strong><br>
          ${item.model_name}<br>
          ${item.colorway_name}<br>
          ${stockText}
        </p>
      </div>
    </div>
  </div>
`;
              });

            $('#cardContainer').html(cardsHtml);


            //  data-bs-toggle="modal" data-bs-target="#productDetailModal
            $('#cardContainer').html(cardsHtml);
          }
        });
      } catch (error) {
        alert("404 Error: Data not found");
      }
    });

    $('#cardContainer').on('click', '.product-card', function () {
        if ($(this).hasClass('out-of-stock')) return;
    const modelId = $(this).data('id');
    window.location.href = 'productpage.php?id=' + modelId;

  // Optional: fetch full details with AJAX if needed
  $.ajax({
    url: 'fetchProductDetails.php', // Replace with your endpoint
    method: 'POST',
    data: { id: modelId },
    dataType: 'json',
    success: function(data) {
      $('#modalModelName').text(data.model_name);
      $('#modalBrandName').text(data.brand_name);
      $('#modalImage').attr('src', data.image1 || 'assets/images/default.jpg');
    }
  });
});











// SEARCH SHOES FUNCTION

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
// FILTER FUNCTION
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

