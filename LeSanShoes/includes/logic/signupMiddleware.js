function signUp() {
    var form = document.getElementById('signupForm');
    if (!form.checkValidity()) {
        form.reportValidity(); 
        return; 
      }
    var formData = new FormData(form);
    var data = {
        action: 'signUp',
        username: formData.get("username").trim(),
        user_fname: formData.get("fname").trim(),
        user_lname: formData.get("lname").trim(),
        user_email: formData.get("email").trim(),
        user_password: formData.get("password").trim(),
        user_passwordConf: formData.get("passwordConf").trim(),
        user_birthday: formData.get("birthdate").trim(),
        user_address: formData.get("address").trim(),
        user_contact: formData.get("contact").trim(),
    };
    verifySignUp(data);
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

    const birthdayInput = formData.user_birthday;
    const year = new Date(birthdayInput).getFullYear();
    var date = new Date();

    if (year.toString().length !== 4) {
        errorString +="--Year input  must be 4 digits only--\n";
    }
    if(new Date(birthdayInput) > date || new Date(birthdayInput).getFullYear() <= (date.getFullYear()-150) ){
        errorString +="--Invalid date input--\n";
    }
    
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
    if(!formData.user_birthday){
        errorString +="--Birthday is empty--\n";
    }
    if(!formData.user_address){
        errorString +="--Address is empty--\n";
    }
    if(!formData.user_contact){
        errorString +="--Contact is empty--\n";
    }
    // if((int)(formData.user_contact)<0){
    //     errorString +="--Contact should not be negative--\n";
    // }
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

