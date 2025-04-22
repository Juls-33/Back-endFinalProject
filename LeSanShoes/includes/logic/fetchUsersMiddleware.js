$(document).ready(function() {
    $('#usersTable').DataTable({
        ajax: '../includes/logic/getUsers.php',
        columns: [
            { data: 'username' },
            { data: 'full_name' },
            { data: 'email' },
            { data: 'birthday'},
            { data: 'user_address'},
            { data: 'contact'},
            { data: 'date_created' },
            { data: 'date_updated'},
            { data: 'last_login' }
        ]
    });
});