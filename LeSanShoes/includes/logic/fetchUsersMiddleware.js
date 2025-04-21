$(document).ready(function() {
    $('#usersTable').DataTable({
        ajax: '../includes/logic/getUsers.php',
        columns: [
            { data: 'username' },
            { data: 'email' },
            { data: 'roles_id'},
            { data: 'date_created' },
            { data: 'last_login' }
        ]
    });
});