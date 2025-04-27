function checkOneField(formData){
    if (!formData.formField) {
        Swal.fire({
            icon: "error",
            title: "Field should not be empty",
        });
        return "error";
    }
}
function checkTwoFields(formData) {
    if (!formData.formField && !formData.tblID) {
        Swal.fire({
            icon: "error",
            title: "Field should not be empty",
        });
        return "error";
    }
}
function checkThreeFields(formData) {
    if (!formData.formField && !formData.tblID && !formData.userRolesDesc) {
        Swal.fire({
            icon: "error",
            title: "Field should not be empty",
        });
        return "error";
    }
}

// Brand functions
function editBrand() {
    var formData = {
        action: 'brandEdit',
        tblID: document.getElementById("brandID").value.trim(),
        formField: document.getElementById("brandEdit").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function addBrand() {
    var formData = {
        action: 'brandAdd',
        tblID: document.getElementById("brandIDAdd").value.trim(),
        formField: document.getElementById("brandAdd").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function deleteBrand() {
    var formData = {
        action: 'brandDelete',
        formField: document.getElementById("brandDelete").value.trim(),
    };
    var isError = checkOneField(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}

// Category
function editCategory() {
    var formData = {
        action: 'categoryEdit',
        tblID: document.getElementById("categoryID").value.trim(),
        formField: document.getElementById("categoryEdit").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function addCategory() {
    var formData = {
        action: 'categoryAdd',
        tblID: document.getElementById("categoryIDAdd").value.trim(),
        formField: document.getElementById("categoryAdd").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function deleteCategory() {
    var formData = {
        action: 'categoryDelete',
        formField: document.getElementById("categoryDelete").value.trim(),
    };
    var isError = checkOneField(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}

// Shoes gender
function editShoesGender() {
    var formData = {
        action: 'shoesGenderEdit',
        tblID: document.getElementById("shoesGenderID").value.trim(),
        formField: document.getElementById("shoesGenderEdit").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function addShoesGender() {
    var formData = {
        action: 'shoesGenderAdd',
        tblID: document.getElementById("shoesGenderIDAdd").value.trim(),
        formField: document.getElementById("shoesGenderAdd").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function deleteShoesGender() {
    var formData = {
        action: 'shoesGenderDelete',
        formField: document.getElementById("shoesGenderDelete").value.trim(),
    };
    var isError = checkOneField(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}

// STATUS
function editStatus() {
    var formData = {
        action: 'statusEdit',
        tblID: document.getElementById("statusID").value.trim(),
        formField: document.getElementById("statusEdit").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function addStatus() {
    var formData = {
        action: 'statusAdd',
        tblID: document.getElementById("statusIDAdd").value.trim(),
        formField: document.getElementById("statusAdd").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function deleteStatus() {
    var formData = {
        action: 'statusDelete',
        formField: document.getElementById("statusDelete").value.trim(),
    };
    var isError = checkOneField(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}

// User Roles
function editRoles() {
    var formData = {
        action: 'userRolesEdit',
        tblID: document.getElementById("userRolesID").value.trim(),
        userRolesDesc: document.getElementById("userRolesDesc").value.trim(),
        formField: document.getElementById("userRolesEdit").value.trim(),
    };
    var isError = checkThreeFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function addRoles() {
    var formData = {
        action: 'userRolesAdd',
        tblID: document.getElementById("userRolesIDAdd").value.trim(),
        userRolesDesc: document.getElementById("userRolesDescAdd").value.trim(),
        formField: document.getElementById("userRolesAdd").value.trim(),
    };
    var isError = checkThreeFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function deleteRoles() {
    var formData = {
        action: 'userRolesDelete',
        formField: document.getElementById("userRolesDelete").value.trim(),
    };
    var isError = checkOneField(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}


//sending form
function sendViaAJAX(formData){
    //sending to php and receiving response from server
    var jsonString = JSON.stringify(formData);
    $.ajax({
        url: "../includes/logic/manageDBToDB.php", 
        type: "POST",
        data: {myJson : jsonString},
        success: function(response) {
            var res = JSON.parse(response);
            if(res.status=="success"){
                Swal.fire({
                    icon: "success",
                    title: res.message,
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
            else{
                Swal.fire({
                    icon: "error",
                    title: res.message,
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
            // Handle any errors that occur during the request
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: 'Error sending data',
            });
        }
    });
}


