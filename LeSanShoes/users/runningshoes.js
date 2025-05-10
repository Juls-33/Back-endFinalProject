console.log("JavaScript is running!");
$(document).ready(function() {
      try {
        $.ajax({
          url: 'runningShoes.php',  
          method: 'POST',
          dataType: 'json',
          success: function(response) {
            let cardsHtml = '';
            response.shoe_models.forEach(item => {
              let imgPath = item.image1 || 'assets/images/default.jpg';  // Default if no image
              cardsHtml += `
                <div class="col-md-4 mb-4 colorway-card" data-search=" ${item.model_name}${item.brand_name}">
                  <div class="card" style="width: 18rem;" data-id="${item.shoe_model_id}" data-bs-toggle="modal" data-bs-target="#productDetailModal">
                    <img src="${imgPath}" class="card-img-top" alt="Shoe Image 1">
                    <div class="card-body p-2 text-center">
                      <p class="card-text small">
                        ${item.model_name} <br>
                        <strong>${item.brand_name}</strong>
                      </p>
                    </div>
                  </div>
                </div>
              `;
            });

            $('#runningCardContainer').html(cardsHtml);
          }
        });
      } catch (error) {
        alert("404 Error: Data not found");
      }
    });

    $('#runningCardContainer').on('click', '.product-card', function () {
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