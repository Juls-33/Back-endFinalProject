function signUp() {
    var formData = {
        action: 'signUp',
        username: document.getElementById("username").value.trim(),
        user_email: document.getElementById("email").value.trim(),
        user_password: document.getElementById("password").value.trim(),
        user_passwordConf: document.getElementById("passwordConf").value.trim(),
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
        document.getElementById("username").classList.add("has-error");
    }
    if(!formData.user_email){
        errorString +="--Email is empty--\n";
        document.getElementById("email").classList.add("has-error");
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
        document.getElementById("password").classList.add("has-error");
    }
    if(!formData.user_passwordConf){
        errorString +="--Confirm password is empty--\n";
        document.getElementById("passwordConf").classList.add("has-error");
    }
    if (formData.user_password!==formData.user_passwordConf){
        errorString +="--The password must match--\n";
    }
    return errorString;
}

function sendViaAJAX(jsonString){
    $.ajax({
        url: "../submitToDB.php", 
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
                });
            
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

