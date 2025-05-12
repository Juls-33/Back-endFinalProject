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