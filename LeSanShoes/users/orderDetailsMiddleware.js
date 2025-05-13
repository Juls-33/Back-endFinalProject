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

$(document).on('click', '.cancel-order-btn', function () {
    const orderId = $(this).data('order-id');

    if (confirm('Are you sure you want to cancel this order?')) {
        const payload = {
            action: 'updateStatus',
            orderId: parseInt(orderId),
            newStatus: 'Cancelled'
        };

        $.ajax({
            type: 'POST',
            url: '../includes/logic/ordersToDB.php',
            data: {
                myJson: JSON.stringify(payload)
            },
            success: function (response) {
                try {
                    Swal.fire({
                        text: "Order cancelled successfully.",
                        icon: "success"
                        });

                    // Refresh the modal content
                    $('#orderDetailsContent').load('getOrderCards.php');
                } catch (e) {
                    console.error('Invalid JSON:', response);
                    alert('Failed to parse response.');
                    Swal.fire({
                        text: "Order failed to cancel",
                        icon: "error"
                        });
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
                alert('Something went wrong.');
            }
        });
    }
});

