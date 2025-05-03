loadTables();
reloadAdminSelect();
function signUp() {
    // var formData = {
    //     action: 'newAdmin',
    //     username: document.getElementById("username").value.trim(),
    //     user_fname: document.getElementById("fname").value.trim(),
    //     user_lname: document.getElementById("lname").value.trim(),
    //     user_email: document.getElementById("email").value.trim(),
    //     user_password: document.getElementById("password").value.trim(),
    //     user_passwordConf: document.getElementById("passwordConf").value.trim(),
    //     user_contact: document.getElementById("contact").value.trim(),
    // };
    // verifySignUp(formData);

    var form = document.getElementById('newAdminForm');
    if (!form.checkValidity()) {
        form.reportValidity(); 
        return; 
      }
    var formData = new FormData(form);
    var data = {
        action: "newAdmin",
        username: formData.get("username").trim(),
        user_fname: formData.get("fname").trim(),
        user_lname: formData.get("lname").trim(),
        user_email: formData.get("email").trim(),
        user_password: formData.get("password").trim(),
        user_passwordConf: formData.get("passwordConf").trim(),
        user_contact: formData.get("contact").trim(),
      };
    // var jsonString = JSON.stringify(data);
    verifySignUp(data);
}

function verifySignUp(formData){
    //check for errors
    var errorString = isSignUpError(formData);
    console.log(errorString);
    if(errorString!=""){
        Swal.fire({
            icon: "error",
            title: errorString,
            width: 600,
            padding: "3em",
            color: "#B51E1E",
            background: "#fff url()",
            backdrop: `
                rgb(0,0,0, 0.1)
                center top
                no-repeat
                    
            `
            });
    }
    else{
        //sending to php and receiving response from server
        var jsonString = JSON.stringify(formData);
        sendViaAJAX(jsonString);
    }  
}

function isSignUpError(formData){

    var errorString = "";
    if (!formData.username) {
        errorString +="--Username is empty--\n";
    }
    if (!formData.user_fname) {
        errorString +="--First name is empty--\n";
    }
    if (!formData.user_lname) {
        errorString +="--Last nameis empty--\n";
    }
    if(!formData.user_email){
        errorString +="--Email is empty--\n";
    }
    if(!formData.user_contact){
        errorString +="--Contact is empty--\n";
    }
    if(formData.user_contact.length!=11){
        errorString +="--Contact number should be 11 digits--\n";
    }
    let emailCtr = 0;
    for (let i = 0; i < formData.user_email.length; i++) {
        let ch = formData.user_email.charCodeAt(i);
        if(ch==64){
            emailCtr++;
            break;
        } 
    } 
    if (emailCtr==0){
        errorString+="--Email must contain @--\n";
    }
    if(!formData.user_password){
        errorString +="--Password is empty--\n";
    }
    if(!formData.user_passwordConf){
        errorString +="--Confirm password is empty--\n";
    }
    if (formData.user_password!==formData.user_passwordConf){
        errorString +="--The password must match--\n";
    }
    return errorString;
}



function sendViaAJAX(jsonString){
    $.ajax({
        url: "../includes/logic/userAuthToDB.php", 
        type: "POST",
        data: {myJson : jsonString},
        success: function(response) {
                Swal.fire({
                icon: "success",
                title: response,
                // html: '<pre>' + message(formData) + '</pre>',
                width: 600,
                padding: "3em",
                color: "#36714b",
                    background: "#fff url()",
                    backdrop: `
                        rgb(0,0,0, 0.1)
                        center top
                        no-repeat
                `
                }).then(() => {
                    // Reset the form
                    document.querySelector("#newAdminModal form").reset();
    
                    // Close the modal using Bootstrap's modal method
                    var modalEl = document.getElementById('newAdminModal');
                    var modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();

                    loadTables();
                    // window.adminTable.ajax.reload(null, false);
                });
            
        },
        error: function() {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: 'Something went wrong! Username already exist',
                color: "#B51E1E",
                    background: "#fff url()",
                    backdrop: `
                        rgb(0,0,0, 0.1)
                        center top
                        no-repeat`
            });
        }
    });
}
document.addEventListener('DOMContentLoaded', function () {
    var newAdminModal = document.getElementById('newAdminModal');

    newAdminModal.addEventListener('hidden.bs.modal', function () {
        // Clear the form inside the modal when it closes
        newAdminModal.querySelector('form').reset();
    });
});

//edit admin
function editAdmin(){
    var formData = {
        action: 'updateAdmin',
        username: document.getElementById("usernameEdit").value.trim(),
        username_update: document.getElementById("updateUsername").value.trim(),
        user_fname: document.getElementById("fnameEdit").value.trim(),
        user_lname: document.getElementById("lnameEdit").value.trim(),
        user_email: document.getElementById("emailEdit").value.trim(),
        user_password: document.getElementById("passwordEdit").value.trim(),
        user_passwordConf: document.getElementById("passwordConfEdit").value.trim(),
        user_contact: document.getElementById("contactEdit").value.trim(),
    };
    verifyEdit(formData);
}

document.getElementById('usernameEdit').addEventListener('change', function () {
    var username = this.value;
    var formData = {
        action: 'getEditDetails',
        username: username,
        // username: document.getElementById("usernameEdit").value.trim(),
    };
    var jsonString = JSON.stringify(formData);
    if (username) {
        $.ajax({
            url: "../includes/logic/userAuthToDB.php", 
            type: "POST",
            data: {myJson : jsonString},
            dataType: 'json',
            success: function(response) {
                document.getElementById('updateUsername').value = response.admin.username || '';
                document.getElementById('fnameEdit').value = response.admin.fname || '';
                document.getElementById('lnameEdit').value = response.admin.lname || '';
                document.getElementById('emailEdit').value = response.admin.email || '';
                document.getElementById('contactEdit').value = response.admin.contact || '';
                document.getElementById('passwordEdit').value = response.admin.user_password || '';
                document.getElementById('passwordConfEdit').value = response.admin.user_password || '';
            },
            error: function() {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: 'Error fetching data',
                    color: "#B51E1E",
                        background: "#fff url()",
                        backdrop: `
                            rgb(0,0,0, 0.1)
                            center top
                            no-repeat`
                });
            }
        });
        
    }
});
function verifyEdit(formData){
    //check for errors
    var errorString = isSignUpError(formData);
    if(errorString!=""){
        Swal.fire({
            icon: "error",
            title: errorString,
            width: 600,
            padding: "3em",
            color: "#B51E1E",
            background: "#fff url()",
            backdrop: `
                rgb(0,0,0, 0.1)
                center top
                no-repeat   
            `
            });
    }
    else{
        //sending to php and receiving response from server
        var jsonString = JSON.stringify(formData);
        sendEditViaAJAX(jsonString);
    }  
}

function sendEditViaAJAX(jsonString){
    $.ajax({
        url: "../includes/logic/userAuthToDB.php", 
        type: "POST",
        data: {myJson : jsonString},
        success: function(response) {
            if(response=="Record was successfully updated."){
                Swal.fire({
                    icon: "success",
                    title: response,
                    // html: '<pre>' + message(formData) + '</pre>',
                    width: 600,
                    padding: "3em",
                    color: "#36714b",
                    background: "#fff url()",
                    backdrop: `
                        rgb(0,0,0, 0.1)
                        center top
                        no-repeat
                    `
                    }).then(()=>{
                        
                        document.querySelector("#editAdminModal form").reset();
                        var modalEl = document.getElementById('editAdminModal');
                        var modal = bootstrap.Modal.getInstance(modalEl);
                        modal.hide();

                        loadTables();
                        // window.adminTable.ajax.reload(null, false);
                    });
            }
            else{
                Swal.fire({
                    icon: "error",
                    title: response,
                    // html: '<pre>' + message(formData) + '</pre>',
                    width: 600,
                    padding: "3em",
                    color: "#B51E1E",
                    background: "#fff url()",
                    backdrop: `
                        rgb(0,0,0, 0.1)
                        center top
                        no-repeat
                    `
                    });
            }   
        },
        error: function() {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: 'Something went wrong! Username does not exist',
                color: "#B51E1E",
                    background: "#fff url()",
                    backdrop: `
                        rgb(0,0,0, 0.1)
                        center top
                        no-repeat`
            });
        }
    });
}
document.addEventListener('DOMContentLoaded', function () {
    var newAdminModal = document.getElementById('editAdminModal');

    newAdminModal.addEventListener('hidden.bs.modal', function () {
        // Clear the form inside the modal when it closes
        newAdminModal.querySelector('form').reset();
    });
});


//delete admin

var usernameToDelete;
function deleteAdmin() {
    var formData = {
        action: 'deleteAdmin',
        username: document.getElementById("deleteUsername").value.trim(),
    };
    if (!formData.username) {
        Swal.fire({
            icon: "error",
            title: "Username is required!",
            color: "#B51E1E",
            background: "#fff url()",
            backdrop: `
                rgb(0,0,0, 0.1)
                center top
                no-repeat`
            
        });
        return;
    }
    var jsonString = JSON.stringify(formData);
    $.ajax({
        url: "../includes/logic/userAuthToDB.php", 
        type: "POST",
        data: { myJson: jsonString },
        success: function(response) {
            try {
                var res = JSON.parse(response);
                if (res.status === "success") {
                    usernameToDelete = formData.username;
                    
                    var modalEl1 = document.getElementById('deleteAdmin1');
                    var modal1 = bootstrap.Modal.getInstance(modalEl1);
                    modal1.hide();

                    var nextModal = new bootstrap.Modal(document.getElementById('deleteAdmin2'));
                    nextModal.show();

                } else {
                    Swal.fire({
                        icon: "error",
                        title: res.message || "Invalid username!",
                        color: "#B51E1E",
                        background: "#fff url()",
                        backdrop: `
                            rgb(0,0,0, 0.1)
                            center top
                            no-repeat`
                    });
                }
            } catch (err) {
                console.error("Invalid response format", err);
            }
        },
        error: function() {
            Swal.fire({
                icon: "error",
                title: "Something went wrong!",
                text: "Could not verify username.",
                color: "#B51E1E",
                    background: "#fff url()",
                    backdrop: `
                        rgb(0,0,0, 0.1)
                        center top
                        no-repeat`
            });
        }
    });
}


function confirmDelete(){
    var formData = {
        action: 'confirmDelete',
        username: usernameToDelete,
        password: document.getElementById("delAdminPassword").value.trim(),
    };
    if (!formData.password) {
        Swal.fire({
            icon: "error",
            title: "Password is required!",
            color: "#B51E1E",
                    background: "#fff url()",
                    backdrop: `
                        rgb(0,0,0, 0.1)
                        center top
                        no-repeat`
        });
        return;
    }
    var jsonString = JSON.stringify(formData);
    $.ajax({
        url: "../includes/logic/userAuthToDB.php", 
        type: "POST",
        data: { myJson: jsonString },
        success: function(response) {
            try {
                var res = JSON.parse(response);
                console.log(response);
                if (res.status === "success") {
                    usernameToDelete = "";
                    Swal.fire({
                        icon: "success",
                        title: res.message,
                        color: "#36714b",
                        background: "#fff url()",
                        backdrop: `
                            rgb(0,0,0, 0.1)
                            center top
                            no-repeat
                        `
                    });
                        var modalEl1 = document.getElementById('deleteAdmin1');
                        var modal1 = bootstrap.Modal.getInstance(modalEl1);
                        modal1.hide();

                        var modalEl2 = document.getElementById('deleteAdmin2');
                        var modal2 = bootstrap.Modal.getInstance(modalEl2);
                        modal2.hide();
                        
                        document.getElementById('deleteUsername').value = "";
                        document.getElementById('adminPassword').value = ""; 
                        document.getElementById('delAdminPassword').value = ""; 
                        loadTables();
                        // window.adminTable.ajax.reload(null, false);
                } 
                else {
                    Swal.fire({
                        icon: "error",
                        title: res.message || "Invalid password!",
                        color: "#B51E1E",
                        background: "#fff url()",
                        backdrop: `
                            rgb(0,0,0, 0.1)
                            center top
                            no-repeat
                        `

                    });
                }
            } catch (err) {
                console.error("Invalid response format", err);
            }
        },
        error: function() {
            Swal.fire({
                icon: "error",
                title: "Something went wrong!",
                text: "Could not verify password.",
                color: "#B51E1E",
                    background: "#fff url()",
                    backdrop: `
                        rgb(0,0,0, 0.1)
                        center top
                        no-repeat
                    `
            });
        }
    });
}

// New Super Admin
var usernameToUpdate;
function newSuperAdmin() {
    var formData = {
        action: 'newSuperAdmin',
        username: document.getElementById("newSuperAdmin").value.trim(),
    };
    if (!formData.username) {
        Swal.fire({
            icon: "error",
            title: "Username is required!",
            color: "#B51E1E",
            background: "#fff url()",
            backdrop: `
                rgb(0,0,0, 0.1)
                center top
                no-repeat
            `
        });
        return;
    }
    var jsonString = JSON.stringify(formData);
    $.ajax({
        url: "../includes/logic/userAuthToDB.php", 
        type: "POST",
        data: { myJson: jsonString },
        success: function(response) {
            try {
                var res = JSON.parse(response);
                if (res.status === "success") {
                    usernameToUpdate = formData.username;
                    
                    var modalEl1 = document.getElementById('newSuperAdmin1');
                    var modal1 = bootstrap.Modal.getInstance(modalEl1);
                    modal1.hide();

                    var nextModal = new bootstrap.Modal(document.getElementById('newSuperAdmin2'));
                    nextModal.show();

                } else {
                    Swal.fire({
                        icon: "error",
                        title: res.message || "Invalid username!",
                        color: "#B51E1E",
                        background: "#fff url()",
                        backdrop: `
                            rgb(0,0,0, 0.1)
                            center top
                            no-repeat
                        `
                    });
                }
            } catch (err) {
                console.error("Invalid response format");
            }
        },
        error: function() {
            Swal.fire({
                icon: "error",
                title: "Something went wrong!",
                text: "Could not verify username.",
                color: "#B51E1E",
                background: "#fff url()",
                backdrop: `
                    rgb(0,0,0, 0.1)
                    center top
                    no-repeat
                `
            });
        }
    });
}

function confirmAddSuperAdmin(){
    var formData = {
        action: 'confirmAddSuperAdmin',
        username: usernameToUpdate,
        password: document.getElementById("adminPassword").value.trim(),
    };
    if (!formData.password) {
        Swal.fire({
            icon: "error",
            title: "Password is required!",
            color: "#B51E1E",
            background: "#fff url()",
            backdrop: `
                rgb(0,0,0, 0.1)
                center top
                no-repeat
            `
        });
        return;
    }
    var jsonString = JSON.stringify(formData);
    $.ajax({
        url: "../includes/logic/userAuthToDB.php", 
        type: "POST",
        data: { myJson: jsonString },
        success: function(response) {
            try {
                var res = JSON.parse(response);
                console.log(response);
                if (res.status === "success") {
                    usernameToUpdate = "";
                    Swal.fire({
                        icon: "success",
                        title: res.message,
                        color: "#36714b",
                        background: "#fff url()",
                        backdrop: `
                            rgb(0,0,0, 0.1)
                            center top
                            no-repeat
                        `
                    });
                        var modalEl1 = document.getElementById('newSuperAdmin1');
                        var modal1 = bootstrap.Modal.getInstance(modalEl1);
                        modal1.hide();

                        var modalEl2 = document.getElementById('newSuperAdmin2');
                        var modal2 = bootstrap.Modal.getInstance(modalEl2);
                        modal2.hide();

                        document.getElementById('newSuperAdmin').value = "";
                        document.getElementById('adminPassword').value = ""; 
                        loadTables();
                        // window.adminTable.ajax.reload(null, false);
                } 
                else {
                    Swal.fire({
                        icon: "error",
                        title: res.message || "Invalid password!",
                        color: "#B51E1E",
                        background: "#fff url()",
                        backdrop: `
                            rgb(0,0,0, 0.1)
                            center top
                            no-repeat
                        `
                    });
                }
            } catch (err) {
                console.error("Invalid response format", err);
            }
        },
        error: function() {
            Swal.fire({
                icon: "error",
                title: "Something went wrong!",
                text: "Could not verify password.",
                color: "#B51E1E",
                background: "#fff url()",
                backdrop: `
                    rgb(0,0,0, 0.1)
                    center top
                    no-repeat
                `
            });
        }
    });
}

var superAdminToDelete;
function deleteSuperAdmin() {
    var formData = {
        action: 'deleteSuperAdmin',
        username: document.getElementById("deleteSuperAdmin").value.trim(),
    };
    if (!formData.username) {
        Swal.fire({
            icon: "error",
            title: "Username is required!",
            color: "#B51E1E",
            background: "#fff url()",
            backdrop: `
                rgb(0,0,0, 0.1)
                center top
                no-repeat
            `
        });
        return;
    }
    var jsonString = JSON.stringify(formData);
    $.ajax({
        url: "../includes/logic/userAuthToDB.php", 
        type: "POST",
        data: { myJson: jsonString },
        success: function(response) {
            try {
                var res = JSON.parse(response);
                if (res.status === "success") {
                    superAdminToDelete = formData.username;
                    
                    var modalEl1 = document.getElementById('deleteSuperAdmin1');
                    var modal1 = bootstrap.Modal.getInstance(modalEl1);
                    modal1.hide();

                    var nextModal = new bootstrap.Modal(document.getElementById('deleteSuperAdmin2'));
                    nextModal.show();

                } else {
                    Swal.fire({
                        icon: "error",
                        title: res.message || "Invalid username!",
                        color: "#B51E1E",
                        background: "#fff url()",
                        backdrop: `
                            rgb(0,0,0, 0.1)
                            center top
                            no-repeat
                        `
                    });
                }
            } catch (err) {
                console.error("Invalid response format");
            }
        },
        error: function() {
            Swal.fire({
                icon: "error",
                title: "Something went wrong!",
                text: "Could not verify username.",
                color: "#B51E1E",
                background: "#fff url()",
                backdrop: `
                    rgb(0,0,0, 0.1)
                    center top
                    no-repeat
                `
            });
        }
    });
}

function confirmDeleteSuperAdmin(){
    var formData = {
        action: 'confirmDeleteSuperAdmin',
        username: superAdminToDelete,
        password: document.getElementById("delSuperAdminPass").value.trim(),
    };
    if (!formData.password) {
        Swal.fire({
            icon: "error",
            title: "Password is required!",
            color: "#B51E1E",
            background: "#fff url()",
            backdrop: `
                rgb(0,0,0, 0.1)
                center top
                no-repeat
            `
        });
        return;
    }
    var jsonString = JSON.stringify(formData);
    $.ajax({
        url: "../includes/logic/userAuthToDB.php", 
        type: "POST",
        data: { myJson: jsonString },
        success: function(response) {
            console.log("Raw server response:", response);
            try {
                var res = JSON.parse(response);
                console.log(response);
                if (res.status === "success") {
                    superAdminToDelete = "";
                    Swal.fire({
                        icon: "success",
                        title: res.message,
                        color: "#36714b",
                        background: "#fff url()",
                        backdrop: `
                            rgb(0,0,0, 0.1)
                            center top
                            no-repeat
                        `
                    });
                        var modalEl1 = document.getElementById('deleteSuperAdmin1');
                        var modal1 = bootstrap.Modal.getInstance(modalEl1);
                        modal1.hide();

                        var modalEl2 = document.getElementById('deleteSuperAdmin2');
                        var modal2 = bootstrap.Modal.getInstance(modalEl2);
                        modal2.hide();

                        document.getElementById('deleteSuperAdmin').value = "";
                        document.getElementById('delSuperAdminPass').value = ""; 
                        loadTables();
                        // window.adminTable.ajax.reload(null, false);
                } 
                else {
                    Swal.fire({
                        icon: "error",
                        title: res.message || "Invalid password!",
                        color: "#B51E1E",
                        background: "#fff url()",
                        backdrop: `
                            rgb(0,0,0, 0.1)
                            center top
                            no-repeat
                        `
                    });
                }
            } catch (err) {
                console.error("Invalid response format", err);
            }
        },
        error: function() {
            Swal.fire({
                icon: "error",
                title: "Something went wrong!",
                text: "Could not verify password.",
                color: "#B51E1E",
                background: "#fff url()",
                backdrop: `
                    rgb(0,0,0, 0.1)
                    center top
                    no-repeat
                `
            });
        }
    });
}

function clearInput(){
    document.getElementById('deleteUsername').value = "";
    document.getElementById('adminPassword').value = ""; 
    document.getElementById('newSuperAdmin').value = "";
    document.getElementById('deleteSuperAdmin').value = "";
    document.getElementById('delSuperAdminPass').value = "";
}

function loadTables(){
    reloadAdminSelect();
    $(document).ready(function() {
        $.ajax({
            url: '../includes/logic/getUsers.php',
            method: 'POST',
            dataType: 'json',
            success: function(response) {
                $('#usersTable').DataTable().clear().destroy();
                $('#adminTable').DataTable().clear().destroy();
                // Users Table
                $('#usersTable').DataTable({
                    destroy: true,
                    scrollX: true,
                    data: response.users,
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
                    ],
                    responsive: true,
                    processing: true,
                    language: {
                        emptyTable: "No admins found."
                    }
                });
                // admin table
                $('#adminTable').DataTable({
                    destroy: true,
                    scrollX: true,
                    data: response.admins,
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
            },
        });
    });
    
}
function reloadAdminSelect() {
    $('.dynamic-admin-select').each(function () {
        const $select = $(this);
        const role = $select.data('role');

        $.ajax({
            url: '../includes/logic/loadAdminSelect.php',
            type: 'POST',
            data: { role: role },
            success: function (data) {
                $select.html(data);
            },
            error: function () {
                $select.html('<option disabled>Error loading options</option>');
            }
        });
    });
}

// Call this after inserting/updating the database
reloadAdminSelect();

