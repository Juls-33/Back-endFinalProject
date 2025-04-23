function signUp() {
    var formData = {
        action: 'newAdmin',
        username: document.getElementById("username").value.trim(),
        user_fname: document.getElementById("fname").value.trim(),
        user_lname: document.getElementById("lname").value.trim(),
        user_email: document.getElementById("email").value.trim(),
        user_password: document.getElementById("password").value.trim(),
        user_passwordConf: document.getElementById("passwordConf").value.trim(),
        user_contact: document.getElementById("contact").value.trim(),
    };
    verifySignUp(formData);
}

function verifySignUp(formData){
    //check for errors
    var errorString = isSignUpError(formData);
    if(errorString!=""){
        Swal.fire({
            icon: "error",
            title: errorString,
            width: 600,
            padding: "3em",
            color: "#716add",
            background: "#fff url()",
            backdrop: `
                rgba(0,0,123,0.4)
                url("")
                center
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
                color: "#716add",
                background: "#fff url()",
                backdrop: `
                    rgba(0,0,123,0.4)
                    url("pictures/yey.gif")
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

                    window.adminTable.ajax.reload(null, false);
                });
            
        },
        error: function() {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: 'Something went wrong! Username already exist',
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
        user_fname: document.getElementById("fnameEdit").value.trim(),
        user_lname: document.getElementById("lnameEdit").value.trim(),
        user_email: document.getElementById("emailEdit").value.trim(),
        user_password: document.getElementById("passwordEdit").value.trim(),
        user_passwordConf: document.getElementById("passwordConfEdit").value.trim(),
        user_contact: document.getElementById("contactEdit").value.trim(),
    };
    verifyEdit(formData);
}
function verifyEdit(formData){
    //check for errors
    var errorString = isSignUpError(formData);
    if(errorString!=""){
        Swal.fire({
            icon: "error",
            title: errorString,
            width: 600,
            padding: "3em",
            color: "#716add",
            background: "#fff url()",
            backdrop: `
                rgba(0,0,123,0.4)
                url("")
                center
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
                    color: "#716add",
                    background: "#fff url()",
                    backdrop: `
                        rgba(0,0,123,0.4)
                        url("pictures/yey.gif")
                        center top
                        no-repeat
                    `
                    }).then(()=>{
                        
                        document.querySelector("#editAdminModal form").reset();
                        var modalEl = document.getElementById('editAdminModal');
                        var modal = bootstrap.Modal.getInstance(modalEl);
                        modal.hide();

                        window.adminTable.ajax.reload(null, false);
                    });
            }
            else{
                Swal.fire({
                    icon: "error",
                    title: response,
                    // html: '<pre>' + message(formData) + '</pre>',
                    width: 600,
                    padding: "3em",
                    color: "#716add",
                    background: "#fff url()",
                    backdrop: `
                        rgba(0,0,123,0.4)
                        url("pictures/yey.gif")
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
                text: "Could not verify username."
            });
        }
    });
}
function test() {
    alert(usernameToDelete)
}
// not yet done
function confirmDelete(){
    var formData = {
        action: 'confirmDelete',
        username: usernameToDelete,
        password: document.getElementById("adminPassword").value.trim(),
    };
    if (!formData.password) {
        Swal.fire({
            icon: "error",
            title: "Username is required!",
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
                    });
                        var modalEl1 = document.getElementById('deleteAdmin1');
                        var modal1 = bootstrap.Modal.getInstance(modalEl1);
                        modal1.hide();

                        var modalEl2 = document.getElementById('deleteAdmin2');
                        var modal2 = bootstrap.Modal.getInstance(modalEl2);
                        modal2.hide();

                        document.getElementById('deleteUsername').value = "";
                        document.getElementById('adminPassword').value = ""; 
                        window.adminTable.ajax.reload(null, false);
                } 
                else {
                    Swal.fire({
                        icon: "error",
                        title: res.message || "Invalid password!",
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
                text: "Could not verify password."
            });
        }
    });
}

function clearInput(){
    document.getElementById('deleteUsername').value = "";
    document.getElementById('adminPassword').value = ""; 
}

