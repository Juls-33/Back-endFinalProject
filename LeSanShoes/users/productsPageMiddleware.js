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
                      data-search="${item.model_name}${item.brand_name}${item.colorway_name}${item.price}">
                    <div class="card product-card"
                        style="width: 18rem; ${isOutOfStock ? 'opacity: 0.5; pointer-events: none;' : ''}"
                        data-id="${item.colorway_id}">
                      <img src="${imgPath}" class="card-img-top" alt="Shoe Image">
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