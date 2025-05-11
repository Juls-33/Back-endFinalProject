console.log("JavaScript is running!");
$(document).ready(function() {
      try {
        $.ajax({
          url: 'TryLangAndrei.php',  
          method: 'POST',
          dataType: 'json',
          success: function(response) {
            let cardsHtml = '';
            response.shoe_models.forEach(item => {
              let imgPath = item.image1 || 'assets/images/default.jpg';  // Default if no image
              cardsHtml += `
                <div class="col-md-4 mb-4 colorway-card" data-search=" ${item.model_name}${item.brand_name}${item.colorway_name}${item.price}">
                  <div class="card product-card" style="width: 18rem;" data-id="${item.colorway_id}"">
                    <img src="${imgPath}" class="card-img-top" alt="Shoe Image 1">
                    <div class="card-body p-2 text-center">
                      <p class="card-text small">
                        <strong>${item.brand_name}</strong><br>
                        ${item.model_name} <br>
                        ${item.colorway_name}<br>
                        <strong>₱ ${item.price}</strong>
                      </p>
                    </div>
                  </div>
                </div>
              `;
            });
            //  data-bs-toggle="modal" data-bs-target="#productDetailModal
            $('#cardContainer').html(cardsHtml);
          }
        });
      } catch (error) {
        alert("404 Error: Data not found");
      }
    });

    $('#cardContainer').on('click', '.product-card', function () {
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