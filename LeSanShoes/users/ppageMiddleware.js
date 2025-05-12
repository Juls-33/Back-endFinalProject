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

//STOCKS
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

// ADD TO CART
$(document).on('click', '.addtoCart', function () {
    if (this.dataset.auth === "false") {
            // e.preventDefault();
            Swal.fire({
                text: "You must be logged in to add items to your cart.",
                icon: "warning",
                showConfirmButton: true,
                confirmButtonText: "Login",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../userAuth/login.php";
                }
            });

        }

    $(document).on('click', '.addtoCart', function () {
    const productName = $('#productDesc .productTitle strong').text();
    const productPriceText = $('#productDesc .productPriceSize strong').text();
    const selectedSize = $('input[name="options-size"]:checked').next('label').text().trim();
    const quantity = parseInt($('#qty-count').text());

    // Fallback if no size selected
    if (!selectedSize) {
        Swal.fire({
            text: "Please select a size first",
            icon: "warning"
            });
        return;
    }

    // Remove non-numeric characters from price string
    const unitPrice = parseFloat(productPriceText.replace(/[^\d.]/g, ''));
    const totalPrice = unitPrice * quantity;

    const bgStyle = $('#mainProductImage').css('background-image');
    const imageUrl = bgStyle.replace(/^url\(["']?/, '').replace(/["']?\)$/, '');

    $('#cart-product-name').text(productName);
    $('#cart-product-price').text(`₱ ${unitPrice.toLocaleString()}`);
    $('#selected-size').text(selectedSize);
    $('#selected-qty').text(quantity);
    $('#cart-total-price').text(`₱ ${totalPrice.toLocaleString()}`);
    $('#cart-product-img').attr('src', imageUrl);

    // Only open modal if everything is valid
    const cartModal = new bootstrap.Modal(document.getElementById('addCartModal'));
    cartModal.show();

    $.ajax({
        url: 'addToCart.php',
        method: 'POST',
        data: {
            name: productName,
            size: selectedSize,
            qty: quantity,
            price: unitPrice,
            total: totalPrice,
            image: imageUrl
        },
        success: function (response) {
            console.log("Cart updated:", response);
        },
        error: function (xhr, status, error) {
            console.error("Add to cart failed:", error);
        }
    });
});


});
