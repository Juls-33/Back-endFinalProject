$(document).ready(function() {
    // Get the username from PHP
    $.ajax({
        url: 'get_username.php',
        method: 'POST',
        contentType: "application/x-www-form-urlencoded",
        dataType: "json",
        success: function(response) {
            if (response.username) {
                loadOrders(response.username);
            } else {
                $('#orderlist').html('No username found.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error getting username: ' + error);
            $('#orderlist').html('Error getting username. Please try again.');
        }
    });

    function loadOrders(username) {
        $.ajax({
            url: 'osquery.php',
            data: {username: username},
            method: 'POST',
            contentType: "application/x-www-form-urlencoded",
            dataType: "json",
            success: function(data) {
                if (data.length > 0) {
                    var html = '';
                    $.each(data, function(index, order) {
                        html += `
                            <div class="col">
                                <div class="card mb-3" style="width: 100%; cursor:pointer; border-color:#5f0000;">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3"><strong>Order ID: ${order.order_id}</strong></h5>
                                        <p class="card-text"><strong>Status: ${order.status}</strong></p>
                                        <p class="card-text">
                                            <medium class="text-muted">${order.colorway_name}</medium>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text mb-2"><strong>Total: Php ${order.total_price}</strong></p>
                                            <button class="btn btn-outline-danger mb-3 ms-2">
                                            Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    $('#orderlist').html(html);
                    initializeDynamicContent();
                } else {
                    $('#orderlist').html('No orders found for this user.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error loading orders: ' + error);
                $('#orderlist').html('Error loading orders. Please try again.');
            }
        });
    }
});
// $(document).ready(function() {
//     // Get the username from the session
//     var username = '<?php echo $_SESSION['username'] ?>';
    
//     if (username) {
//         $.ajax({
//             url: 'osquery.php',
//             data: {username: username},
//             method: 'POST',
//             contentType: "application/x-www-form-urlencoded",
//             dataType: "json",
//             success: function(data) {
//                 if (data.length > 0) {
//                     var html = '';
//                     $.each(data, function(index, order) {
//                         html += `
//                             <div class="col">
//                                 <div class="card mb-3" style="width: 100%; cursor:pointer; border-color:#5f0000;">
//                                     <div class="card-body">
//                                         <h5 class="card-title mb-3"><strong>Order ID: ${order.order_id}</strong></h5>
//                                         <p class="card-text"><strong>Status: ${order.status}</strong></p>
//                                         <p class="card-text">
//                                             <medium class="text-muted">${order.colorway_name}</medium>
//                                         </p>
//                                         <div class="d-flex justify-content-between align-items-center">
//                                             <p class="card-text mb-2"><strong>Total: Php ${order.total_price}</strong></p>
//                                             <button class="btn btn-outline-danger mb-3 ms-2">
//                                             Cancel
//                                             </button>
//                                         </div>
//                                     </div>
//                                 </div>
//                             </div>
//                         `;
//                     });
//                     $('#orderlist').html(html);
//                     initializeDynamicContent();
//                 } else {
//                     $('#orderlist').html('No orders found for this user.');
//                 }
//             },
//             error: function(xhr, status, error) {
//                 console.error('Error loading orders: ' + error);
//                 $('#orderlist').html('Error loading orders. Please try again.');
//             }
//         });
//     } else {
//         $('#orderlist').html('No username found.');
//     }
// });