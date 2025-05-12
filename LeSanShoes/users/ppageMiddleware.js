$(document).ready(function() {
    // Get the modelID from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const modelId = urlParams.get('id');
    
    if (modelId) {
        $.ajax({
            url: 'ppquery.php',
            data: {id: modelId},
            method: 'POST',
            contentType: "application/x-www-form-urlencoded",
            dataType: "html",
            success: function(pdetails) {
                $('#mainpart').html(pdetails);
            },
            error: function(xhr, status, error) {
                console.error('Error loading product details: ' + error);
                $('#mainpart').html('Error loading product details. Please try again.');
            }
        });
    } else {
        $('#mainpart').html('No product ID provided.');
    }
});


let quantity = 1;

// Handle size selection (delegated)
$(document).on('click', '.size-button', function () {
    const stock = parseInt($(this).data('stock'));
    $('#selected-size-stock').val(stock);
    quantity = 1;
    $('#qty-count').text(quantity);
    updateQtyButtons(stock);
});

// Handle quantity buttons (delegated)
$(document).on('click', '#qty-increase', function () {
    const maxStock = parseInt($('#selected-size-stock').val());
    if (quantity < maxStock) {
        quantity++;
        $('#qty-count').text(quantity);
        updateQtyButtons(maxStock);
    }
});

$(document).on('click', '#qty-decrease', function () {
    if (quantity > 1) {
        quantity--;
        $('#qty-count').text(quantity);
        updateQtyButtons(parseInt($('#selected-size-stock').val()));
    }
});

function updateQtyButtons(stock) {
    $('#qty-increase').prop('disabled', quantity >= stock);
    $('#qty-decrease').prop('disabled', quantity <= 1);
}   