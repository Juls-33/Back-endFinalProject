// loadTables();
function loadTables(){
    $(document).ready(function() {
        
        $.ajax({
        url: '../includes/logic/getOrders.php',
        method: 'POST',
            dataType: 'json',
            success: function(response) {
                // $('#shoesTable').DataTable().clear().destroy();
                // Brand Table
                
                const table = $('#ordersTable').DataTable({
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
                        { data: 'image1',
                             render: function(data, type, row) {
                                return `<img src="${data}" class="img-thumbnail" style="width: 60px; height: auto;">`;
                            }
                        },
                        
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="${row.order_id}" data-name="${row.colorway_name}" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                `;
                            }
                        }
                    ],
                    responsive: true,
                    processing: true,
                });
                // row click handler
                $('#ordersTable tbody').off('click', 'tr').on('click', 'tr', function () {
                const rowData = table.row(this).data();
                if (!rowData) return;

                $('#modalOrderId').text(rowData.order_id);
                $('#modalUsername').text(rowData.username);
                $('#modalTotalPrice').text(rowData.total_price);
                $('#modalOrderDate').text(rowData.order_date);
                $('#modalStatus').text(rowData.status);
                $('#modalAddress').text(rowData.customer_address || 'N/A');
                $('#modalModelName').text(rowData.model_name);
                $('#modalSizeName').text(rowData.size_name);
                $('#modalColorwayName').text(rowData.colorway_name);
                $('#modalQuantity').text(rowData.quantity);

                // Item info
                $('#modalItemsContainer').html(`
                    <img src="${rowData.image1}" class="img-fluid rounded" width="100%">
                `);
                const modal = new bootstrap.Modal(document.getElementById('orderDetailModal'));
                modal.show();
                })
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    });
}

$(document).ready(function () {
  loadTables();


$('#updateOrderStatusBtn').on('click', function () {
const orderId = $('#modalOrderId').text();
const newStatus = $('#orderStatusDropdown').val();
var data = {
    action: "updateStatus",
    orderId: orderId,
    newStatus: newStatus,
    
};
console.log(data.newStatus);
    var jsonString = JSON.stringify(data);
    $.ajax({
        url: '../includes/logic/ordersToDB.php',
        method: 'POST',
        data: {myJson : jsonString},
        success: function(response) {
            Swal.fire({
            title: "Updated Successfully",
            icon: "success",
            draggable: true
            });
            $('#orderDetailModal').modal('hide');
            loadTables(); // refresh table
        }
    });
});

  
})

