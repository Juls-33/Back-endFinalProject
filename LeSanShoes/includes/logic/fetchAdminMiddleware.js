$(document).ready(function() {
    window.adminTable = $('#adminTable').DataTable({
        ajax:{
            url: '../includes/logic/getAdmin.php',
            dataSrc: 'data'
        },
        columns: [
            { data: 'username' },
            { data: 'full_name' },
            { data: 'email' },
            { 
                data: 'roles_id',
                render: function(data) {
                    return data == 2 ? "Super Admin" : data == 3 ? "Admin" : "Other";
                }
            },
            { data: 'contact' },
            { data: 'date_created' },
            { data: 'date_updated' },
            { data: 'last_login' }
        ],
        responsive: true,
        processing: true,
        language: {
            emptyTable: "No admins found."
        }
    });
});