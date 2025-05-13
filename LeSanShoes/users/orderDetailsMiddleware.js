$('#orderDetailsModal').on('show.bs.modal', function () {
    // When modal opens, fetch order cards
    $.ajax({
        url: 'getOrderCards.php',
        method: 'GET',
        success: function (response) {
            $('#orderDetailsContent').html(response);
        },
        error: function () {
            $('#orderDetailsContent').html('<p class="text-danger">Failed to load orders.</p>');
        }
    });
});
