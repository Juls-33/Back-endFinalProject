console.log("javascript is running");

function updateName() {
    var form = document.getElementById('nameForm');
    if (!form.checkValidity()) {
        form.reportValidity(); 
        return; 
      }
    var formData = new FormData(form);
    var data = {
        action: 'editName',
        fname: formData.get("fname").trim(),
        lname: formData.get("lname").trim(),
    };

    var jsonString = JSON.stringify(data);
    sendViaAJAX(jsonString);
}
function updateEmail() {
    var form = document.getElementById('emailForm');
    if (!form.checkValidity()) {
        form.reportValidity(); 
        return; 
      }
    var formData = new FormData(form);
    var data = {
        action: 'editEmail',
        email: formData.get("email").trim(),
    };

    var jsonString = JSON.stringify(data);
    sendViaAJAX(jsonString);
}
function updateAddress() {
    var form = document.getElementById('addressForm');
    if (!form.checkValidity()) {
        form.reportValidity(); 
        return; 
      }
    var formData = new FormData(form);
    var data = {
        action: 'editAddress',
        address: formData.get("address").trim(),
    };

    var jsonString = JSON.stringify(data);
    sendViaAJAX(jsonString);
}

// function password() {
//     var form = document.getElementById('passwordForm');
//     if (!form.checkValidity()) {
//         form.reportValidity(); 
//         return; 
//       }
//     var formData = new FormData(form);
//     var data = {
//         action: 'editPassword',
//         fname: formData.get("password").trim(),
//     };

//     var jsonString = JSON.stringify(data);
//     sendViaAJAX(jsonString);
// }
function updateContact() {
    var form = document.getElementById('contactForm');
    if (!form.checkValidity()) {
        form.reportValidity(); 
        return; 
      }
    var formData = new FormData(form);
    var data = {
        action: 'editContact',
        contact: formData.get("contact").trim(),
    };

    var jsonString = JSON.stringify(data);
    sendViaAJAX(jsonString);
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

 function username() {
    console.log("pasokkk");
    var form = document.getElementById('usernameForm');
    if (!form.checkValidity()) {
        form.reportValidity(); 
        return; 
      }
    //   
    var formData = new FormData(form);
    var data = {
        action: 'editUsername',
        username: formData.get("username").trim(),
    };

    var jsonString = JSON.stringify(data);
    sendViaAJAX(jsonString);
}