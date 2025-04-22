function login() {
    var formData = {
        action: 'login',
        username: document.getElementById("username").value.trim(),
        user_password: document.getElementById("password").value.trim(),
    };
    sendViaAJAX(formData);
}

function sendViaAJAX(formData){
    //check for errors
    var errorString = isLoginError(formData);
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
        $.ajax({
            url: "../includes/logic/userAuthToDB.php", 
            type: "POST",
            data: {myJson : jsonString},
            success: function(response) {
                let res;
                try {
                    res = JSON.parse(response);
                } catch (e) {
                    Swal.fire({
                        icon: "error",
                        title: "Unexpected response from server",
                        text: response
                    });
                    return;
                }
            
                if (res.status === "success") {
                    if (res.roles_id == 1) {
                        window.location.href = "../users/index.php";
                    } else if (res.roles_id == 2 || res.roles_id == 3) {
                        window.location.href = "../admin/DashboardAdmin.php";
                    } else {
                        Swal.fire({
                            icon: "warning",
                            title: "Unknown role",
                            text: "No redirection configured for this role."
                        });
                    }
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Login failed",
                        text: res.message
                    });
                }
            },
            error: function() {
                // Handle any errors that occur during the request
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: 'Something went wrong! Username already exist',
                });
            }
        });
        
    }  
}
function isLoginError(formData){

    var errorString = "";
    if (!formData.username) {
        errorString +="--Username is empty--\n";
        document.getElementById("username").classList.add("has-error");
    }  
    if(!formData.user_password){
        errorString +="--Password is empty--\n";
        document.getElementById("password").classList.add("has-error");
    }
    return errorString;
}


