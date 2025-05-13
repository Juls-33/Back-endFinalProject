// Global variables
let images = [];
let currentIndex = 0;

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
                initializeDynamicContent();
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


function fetchImages(modelId) {
    $.ajax({
        url: 'forImageModal.php',
        data: { id: modelId },
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            images = data;
            updateThumbnailList();
        },
        error: function(xhr, status, error) {
            console.error('Error fetching images: ' + error);
        }
    });
}
$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const modelId = urlParams.get('id');
    
    if (modelId) {
        fetchImages(modelId);
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
        return;
    }

    const productName = $('#productDesc .productTitle strong').text();
    const productPriceText = $('#productDesc .productPriceSize strong').text();
    const selectedRadio = $('input[name="options-size"]:checked');
    const selectedSize = selectedRadio.next('label').text().trim();
    const colorwaySizeId = selectedRadio.data('size-id'); 
    const quantity = parseInt($('#qty-count').text());

    if (!selectedSize) {
        Swal.fire({
            text: "Please select a size first",
            icon: "warning"
        });
        return;
    }

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

    const cartModal = new bootstrap.Modal(document.getElementById('addCartModal'));
    cartModal.show();

    const data = {
        action: 'addToCart',
        colorway_size_id: colorwaySizeId,
        qty: quantity,
        total: totalPrice,
    };

    $.ajax({
        url: 'addToCart.php',
        method: 'POST',
        data: { myJson: JSON.stringify(data) },
        success: function (response) {
            console.log("Cart updated:", response);
        },
        error: function (xhr, status, error) {
            console.error("Add to cart failed:", error);
        }
    });
});


// OPEN CART
$(document).on('click', '#openCartBtn', function () {
    
    $.ajax({
        url: 'getCartItems.php',
        method: 'POST',
        dataType: 'json',
        success: function (response) {
            if (!response.cartItems || response.cartItems.length === 0) {
                $('#cartItems').html('<p>Your cart is empty.</p>');
                $('#cartFooter').hide();
                return;
            }
            $('#cartItems').empty();
            var subtotal = 0;
            response.cartItems.forEach((item, index) => {
                subtotal += parseFloat(item.total_price);
                $('#cartItems').append(`
                    <div class="card mb-3 cart-card" data-index="${index}" style="cursor: pointer;">
                        <div class="row g-0 rowcart align-items-center">
                            <div class="col-auto ps-3">
                                <input type="checkbox" class="form-check-input cart-check" 
                                data-price="${item.total_price}"
                                data-quantity="${item.quantity}"
                                data-stock="${item.stock}"
                                data-index="${index}" 
                                data-cart-id="${item.cart_id}"
                                data-colorway-id="${item.colorway_id}"
                                data-price-at-order="${item.price}"
                                data-colorway-size-id="${item.colorway_size_id}">
                            </div>
                            <div class="col-md-4">
                                <img src="${item.image1}" class="img-fluid rounded-start" style="object-fit: contain;">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title">${item.model_name}</h5>
                                    <small class="text-muted">${item.colorway_name}</small>
                                    <p class="card-text"><strong>₱${parseFloat(item.total_price).toLocaleString()}</strong></p>
                                    
                                    <div class="mb-2 d-flex align-items-center">
                                        <label class="me-2 mb-0">Size:</label>
                                        <select class="form-select form-select-sm cart-size-select" data-colorway-id="${item.colorway_id}" data-cart-id="${item.cart_id}">
                                            <option selected>${item.size_name}</option>
                                        </select>
                                    </div>

                                    <div class="mb-2 d-flex align-items-center">
                                        <label class="me-2 mb-0">Qty:</label>
                                        <button class="btn btn-outline-secondary btn-sm mbtn qty-decrease" data-cart-id="${item.cart_id}" data-price-at-order="${item.price}">−</button>
                                        <span class="mx-2 cart-qty" data-cart-id="${item.cart_id}" data-price-at-order="${item.price}">${item.quantity}</span>
                                        <button class="btn btn-outline-secondary btn-sm mbtn qty-increase" data-cart-id="${item.cart_id}" data-price-at-order="${item.price}">+</button>
                                    </div>
                                    <button class="btn btn-sm btn-danger cart-delete-btn mbtn mt-1" data-cart-id="${item.cart_id}">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            });

        $('#cartSubtotal').text(`₱${subtotal.toLocaleString()}`);
        $('#cartFooter').show()
        },
        error: function (xhr) {
            Swal.fire("Error loading cart", xhr.responseText, "error");
        }
    });
});

// click cart
$(document).off('click', '.cart-card').on('click', '.cart-card', function (e) {
    const $target = $(e.target);

    // Prevent toggle if click is on checkbox or interactive elements
    if (
        $target.is('.cart-check') ||
        $target.is('.qty-increase') ||
        $target.is('.qty-decrease') ||
        $target.is('.cart-delete-btn') ||
        $target.is('.cart-size-select') ||
        $target.closest('.cart-size-select').length > 0 
    ) {
        return;
    }

    const index = $(this).data('index');
    const checkbox = $(`.cart-check[data-index="${index}"]`);
    checkbox.prop('checked', !checkbox.prop('checked')).trigger('change');
    let subtotal = 0;
    $('.cart-check:checked').each(function () {
        subtotal += parseFloat($(this).data('price'));
    });
    $('.cart-check').each(function () {
        const card = $(this).closest('.cart-card');
        if ($(this).is(':checked')) {
            card.addClass('selected');
        } else {
            card.removeClass('selected');
        }
    });
    $('#cartSubtotal').text(`₱${subtotal.toLocaleString()}`);
});

// checkout

$(document).on('click', '#checkoutBtn', function () {
    const selectedItems = [];

    $('.cart-check:checked').each(function () {
        const index = $(this).data('index');
        const card = $(`.cart-card[data-index="${index}"]`);

        const item = {
            cart_id: $(this).data('cart-id'),
            colorway_id: $(this).data('colorway-id'),
            colorway_size_id: $(this).data('colorway-size-id'),
            price_at_order: $(this).data('price-at-order'),
            model_name: card.find('.card-title').text(),
            colorway_name: card.find('.text-muted').text(),
            total_price: parseFloat($(this).data('price')),
            size_name: card.find('.cart-size-select').val(), 
            quantity: $(this).data('quantity'),
            image1: card.find('img').attr('src')
        };

        selectedItems.push(item);
    });

    if (selectedItems.length === 0) {
        Swal.fire("No items selected", "Please select at least one item to checkout.", "warning");
        return;
    }

    sessionStorage.setItem('checkoutItems', JSON.stringify(selectedItems));
    window.location.href = 'checkoutPage.php';
  
    // Swal.fire("Checkout Ready", "Proceeding to checkout with selected items.", "success");
});

// get sizes for cart
$(document).on('focus', '.cart-size-select', function () {
    const select = $(this);
    const colorwayId = select.data('colorway-id');
    const cartId = select.data('cart-id');

    $.ajax({
        url: 'cartActions.php',
        method: 'POST',
        data: {
            action: 'getSizesForColorway',
            colorway_id: colorwayId
        },
        dataType: 'json',
        success: function (sizes) {
            select.empty();
            sizes.forEach(size => {
                select.append(`<option value="${size.size_id}">${size.size_name}</option>`);
            });
        },
        error: function (xhr) {
            console.error('Failed to load sizes:', xhr.responseText);
        }
    });
});
// quantity increase for cart
$(document).on('click', '.qty-increase, .qty-decrease', function () {
    const isIncrease = $(this).hasClass('qty-increase');
    const cartId = $(this).data('cart-id');
    const price = $(this).data('price-at-order');
    const qtySpan = $(`.cart-qty[data-cart-id="${cartId}"]`);
    let qty = parseInt(qtySpan.text());

    const checkbox = $(`.cart-check[data-cart-id="${cartId}"]`);
    const maxStock = parseInt(checkbox.attr('data-stock'));
    
    console.log(price);
    if (isIncrease && qty<maxStock) {
        qty++;
    } else if (!isIncrease && qty > 1) {
        qty--;
    }

    qtySpan.text(qty);

    checkbox.attr('data-quantity', qty);
    const newTotalPrice = qty * price;
    checkbox.attr('data-price', newTotalPrice);

    const card = $(`.cart-card[data-index="${checkbox.data('index')}"]`);
    card.find('.card-text strong').text(`₱${newTotalPrice.toLocaleString(undefined, { minimumFractionDigits: 2 })}`);
    updateCartSubtotal();
    $.post('cartActions.php', {
        action: 'updateCartQuantity',
        cart_id: cartId,
        price: price,
        quantity: qty
    }, function (res) {
        console.log('Qty updated:', res);
        // $('#openCartBtn').click();
    });
});
// delete cart
$(document).on('click', '.cart-delete-btn', function () {
    const cartId = $(this).data('cart-id');
    $.post('cartActions.php', {
        action: 'deleteCartItem',
        cart_id: cartId
    }, function (res) {
        console.log('Deleted:', res);
        $('#openCartBtn').click();
    });
});


// update cart subtotal
function updateCartSubtotal() {
    let subtotal = 0;

    $('.cart-check:checked').each(function () {
        const index = $(this).data('index');
        const card = $(`.cart-card[data-index="${index}"]`);
        const qty = parseInt($(`.cart-qty[data-cart-id="${$(this).data('cart-id')}"]`).text());
        const pricePerItem = parseFloat($(this).data('price-at-order'));

        subtotal += qty * pricePerItem;
    });

    $('#cartSubtotal').text(subtotal.toLocaleString(undefined, { minimumFractionDigits: 2 }));
}

// Function to open the modal
function openModal(index) {
    currentIndex = index;
    const modalImageDiv = document.getElementById('modalImage');
    modalImageDiv.style.backgroundImage = `url('${images[currentIndex]}')`;
    updateThumbnailList();
    
    // Initialize and show the modal
    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    modal.show();
}
function changeImage(direction) {
    // Calculate new index
    let newIndex = currentIndex + direction;
    
    // Wrap around if needed
    if (newIndex < 0) {
        newIndex = images.length - 1;
    } else if (newIndex >= images.length) {
        newIndex = 0;
    }
    
    // Update current index and image
    currentIndex = newIndex;
    const modalImageDiv = document.getElementById('modalImage');
    modalImageDiv.style.backgroundImage = `url('${images[currentIndex]}')`;
    resetZoom(modalImageDiv);
    updateThumbnailList();
}

// Function to zoom the image
function zoom(event, element) {
    const rect = element.getBoundingClientRect();
    const x = (event.clientX - rect.left) / element.offsetWidth;
    const y = (event.clientY - rect.top) / element.offsetHeight;
    element.style.backgroundPosition = `${x * 100}% ${y * 100}%`;
}

// Function to reset the zoom
function resetZoom(element) {
    element.style.backgroundPosition = 'center';
    element.style.backgroundSize = 'cover';
}
document.getElementById('imageModal').addEventListener('hidden.bs.modal', function () {
    // Remove any remaining backdrop
    document.querySelectorAll('.modal-backdrop').forEach(backdrop => backdrop.remove());
    
    // Reset body styles
    document.body.style.overflow = 'auto';
    document.body.style.paddingRight = '';
});

// Function to update the thumbnail list
function updateThumbnailList() {
    const thumbnailList = $('#thumbnailList');
    thumbnailList.empty(); // Clear existing thumbnails
    
    images.forEach((image, index) => {
        const thumbnail = $('<div></div>')
            .addClass('thumbnail-item')
            .css({
                'background-image': `url('${image}')`,
                'width': '80px',
                'height': '80px',
                'background-size': 'cover',
                'cursor': 'pointer',
                'margin': '0 5px',
                'border': currentIndex === index ? '2px solid #B51E1E' : '2px solid transparent'
            })
            .on('click', function() {
                currentIndex = index;
                const modalImageDiv = document.getElementById('modalImage');
                modalImageDiv.style.backgroundImage = `url('${images[currentIndex]}')`;
                resetZoom(modalImageDiv);
                updateThumbnailList();
            });
        thumbnailList.append(thumbnail);
    });
}

// Function to initialize the dynamic content
function initializeDynamicContent() {
    // Attach event listeners to dynamically loaded elements
    $('.img-zoom').on('mousemove', function(event) {
        zoom(event, this);
    }).on('mouseleave', function() {
        resetZoom(this);
    }).on('click', function() {
        const index = $(this).data('index'); // Assuming you set data-index attribute
        openModal(index);
    });
}   
