loadTables();
function loadTables(){
    $(document).ready(function() {
        
        $.ajax({
        url: 'getOrders.php',
        method: 'POST',
            dataType: 'json',
            success: function(response) {
                // $('#shoesTable').DataTable().clear().destroy();
                // Brand Table
                
                $('#ordersTable').DataTable({
                    scrollX: true,
                    destroy: true,
                    data: response.orders,
                    columns: [
                        { data: 'order_id' },
                        { data: 'username' },
                        {
                            data: 'total_price',
                            className: 'wrap-text'
                        },
                        { data: 'order_date' },
                        { data: 'status' },
                        { data: 'quantity' },
                        { data: 'colorway_name' },
                        { data: 'size_name' },
                        { data: 'model_name' },
                        { data: 'image1'},
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `
                                    <button class="btn btn-sm btn-primary edit-btn" data-id="${row.order_id}">Edit</button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="${row.row_id}" data-name="${row.model_name}" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                `;
                            }
                        }
                    ],
                    responsive: true,
                    processing: true,
                });
            },
        });
    });
}