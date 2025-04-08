function signUp() {
    var formData = {
        action: 'signUp',
        username: document.getElementById("username").value.trim(),
        user_email: document.getElementById("email").value.trim(),
        user_password: document.getElementById("password").value.trim(),
        user_passwordConf: document.getElementById("passwordConf").value.trim(),
    };
    sendToPHP(formData);
}

function sendToPHP(formData){
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
        //removing error design when it's correct
        const input = document.getElementsByTagName("input");
        for (let i = 0; i < input.length; i++) {
            if(i==2 || i==3){
                continue;
            }
            input[i].classList.remove("inputDesignError");
        }
        //sending to php and receiving response from server
        var jsonString = JSON.stringify(formData);
        $.ajax({
            url: "", 
            type: "POST",
            data: {myJson : jsonString},
            success: function(response) {
                //Cannot classify to a class
                if(response=="noID"){
                    Swal.fire({
                        title: "ID Does not exist",
                        text: "The ID you entered does not exist.",
                        icon: "warning"
                    });
                }//ID exist (new record)
                else if(response=="IDExist"){
                    Swal.fire({
                        title: "ID already exist",
                        text: "The first name and last name combination you entered already exist.",
                        icon: "warning"
                    });
                }
                else{

                    Swal.fire({
                    icon: "success",
                    title: response,
                    html: '<pre>' + message(formData) + '</pre>',
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
            error: function(response) {
                // Handle any errors that occur during the request
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: 'Something went wrong! ID already exist',
                });
            }
        });
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
        console.log(ch);
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

function ajaxToPHP(){

}