$(document).ready(function() {
    $.ajax({
        url: '../includes/logic/getManageDB.php',
        method: 'POST',
        dataType: 'json',
        success: function(response) {
            // Brand Table
            $('#brandTable').DataTable({
                destroy: true,
                data: response.brands,
                columns: [
                    { data: 'brand_id' },
                    { data: 'brand_name' },
                    { data: 'date_created' },
                    { data: 'date_updated' }
                ]
            });

            // Category Table
            $('#categoryTable').DataTable({
                destroy: true,
                data: response.categories,
                columns: [
                    { data: 'category_id' },
                    { data: 'category_name' },
                    { data: 'date_created' },
                    { data: 'date_updated' }
                ]
            });
            // Shoes gender Table
            $('#genderTable').DataTable({
                destroy: true,
                data: response.shoes_gender,
                columns: [
                    { data: 'shoes_gender_id' },
                    { data: 'shoes_gender_name' },
                    { data: 'date_created' },
                    { data: 'date_updated' }
                ]
            });
            // Status Table
            $('#statusTable').DataTable({
                destroy: true,
                data: response.statusData,
                columns: [
                    { data: 'status_id' },
                    { data: 'status_name' },
                    { data: 'date_created' },
                    { data: 'date_updated' }
                ]
            });
            $('#rolesTable').DataTable({
                destroy: true,
                data: response.roles,
                columns: [
                    { data: 'roles_id' },
                    { data: 'roles_name' },
                    { data: 'roles_desc' },
                    { data: 'date_created' },
                    { data: 'date_updated' }
                ]
            });
        },
    });
});
