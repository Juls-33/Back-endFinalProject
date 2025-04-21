$(document).ready(function() {
    $('#adminTable').DataTable({
        ajax: '../includes/logic/getAdmin.php',
        columns: [
            { data: 'username' },
            { data: 'email' },
            { 
                data: 'roles_id',
                render: function(data) {
                    return data == 2 ? "Super Admin" : data == 3 ? "Admin" : "Other";
                }
            },
            { data: 'date_created' },
            { data: 'last_login' }
        ]
    });
});