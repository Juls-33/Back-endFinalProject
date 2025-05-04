loadTables();
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
    if (isError == "error") return;
    sendViaAJAX(formData);
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
    if(isError=="error") return;
     sendViaAJAX(formData);
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
// Material
function editMaterial() {
    var formData = {
        action: 'materialEdit',
        tblID: document.getElementById("materialID").value.trim(),
        formField: document.getElementById("materialEdit").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function addMaterial() {
    var formData = {
        action: 'materialAdd',
        tblID: document.getElementById("materialIDAdd").value.trim(),
        formField: document.getElementById("materialAdd").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function deleteMaterial() {
    var formData = {
        action: 'materialDelete',
        formField: document.getElementById("materialDelete").value.trim(),
    };
    var isError = checkOneField(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
// Traction
function editTraction() {
    var formData = {
        action: 'tractionEdit',
        tblID: document.getElementById("tractionID").value.trim(),
        formField: document.getElementById("tractionEdit").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function addTraction() {
    var formData = {
        action: 'tractionAdd',
        tblID: document.getElementById("tractionIDAdd").value.trim(),
        formField: document.getElementById("tractionAdd").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function deleteTraction() {
    var formData = {
        action: 'tractionDelete',
        formField: document.getElementById("tractionDelete").value.trim(),
    };
    var isError = checkOneField(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
// Support
function editSupport() {
    var formData = {
        action: 'supportEdit',
        tblID: document.getElementById("supportID").value.trim(),
        formField: document.getElementById("supportEdit").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function addSupport() {
    var formData = {
        action: 'supportAdd',
        tblID: document.getElementById("supportIDAdd").value.trim(),
        formField: document.getElementById("supportAdd").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function deleteSupport() {
    var formData = {
        action: 'supportDelete',
        formField: document.getElementById("supportDelete").value.trim(),
    };
    var isError = checkOneField(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}



// Technology
function editTechnology() {
    var formData = {
        action: 'technologyEdit',
        tblID: document.getElementById("technologyID").value.trim(),
        formField: document.getElementById("technologyEdit").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function addTechnology() {
    var formData = {
        action: 'technologyAdd',
        tblID: document.getElementById("technologyIDAdd").value.trim(),
        formField: document.getElementById("technologyAdd").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function deleteTechnology() {
    var formData = {
        action: 'technologyDelete',
        formField: document.getElementById("technologyDelete").value.trim(),
    };
    var isError = checkOneField(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
// Size
function editSize() {
    var formData = {
        action: 'sizeEdit',
        tblID: document.getElementById("sizeID").value.trim(),
        formField: document.getElementById("sizeEdit").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function addSize() {
    var formData = {
        action: 'sizeAdd',
        tblID: document.getElementById("sizeIDAdd").value.trim(),
        formField: document.getElementById("sizeAdd").value.trim(),
    };
    var isError = checkTwoFields(formData);
    if(isError=="error") return; sendViaAJAX(formData);
}
function deleteSize() {
    var formData = {
        action: 'sizeDelete',
        formField: document.getElementById("sizeDelete").value.trim(),
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
                    color: "#36714b",
                    background: "#fff url()",
                    backdrop: `
                        rgb(0,0,0, 0.1)
                        center top
                        no-repeat
                    `
                    });
                    loadTables();
                    closeModal();
            }
            else{
                Swal.fire({
                    icon: "error",
                    title: res.message,
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
            // Handle any errors that occur during the request
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: 'Table name or table ID should be unique',
            });
        }
    });
}

function loadTables(){
    clearInputs();
    
    $(document).ready(function() {
        $.ajax({
            url: '../includes/logic/getManageDB.php',
            method: 'POST',
            dataType: 'json',
            success: function(response) {
                $('#brandTable').DataTable().clear().destroy();
                $('#categoryTable').DataTable().clear().destroy();
                $('#genderTable').DataTable().clear().destroy();
                $('#statusTable').DataTable().clear().destroy();
                $('#rolesTable').DataTable().clear().destroy();
                $('#materialTable').DataTable().clear().destroy();
                $('#tractionTable').DataTable().clear().destroy();
                $('#supportTable').DataTable().clear().destroy();
                $('#technologyTable').DataTable().clear().destroy();
                $('#sizeTable').DataTable().clear().destroy();
                // Brand Table
                $('#brandTable').DataTable({
                    destroy: true,
                    data: response.brands,
                    columns: [
                        { data: 'brand_id' },
                        { data: 'brand_name' },
                        { data: 'date_created' },
                        { data: 'date_updated' }
                    ]
                });
    
                // Category Table
                $('#categoryTable').DataTable({
                    destroy: true,
                    data: response.categories,
                    columns: [
                        { data: 'category_id' },
                        { data: 'category_name' },
                        { data: 'date_created' },
                        { data: 'date_updated' }
                    ],
                    responsive: true,
                    processing: true,
                });
                // Shoes gender Table
                $('#genderTable').DataTable({
                    destroy: true,
                    data: response.shoes_gender,
                    columns: [
                        { data: 'shoes_gender_id' },
                        { data: 'shoes_gender_name' },
                        { data: 'date_created' },
                        { data: 'date_updated' }
                    ],
                    responsive: true,
                    processing: true,
                });
                // Status Table
                $('#statusTable').DataTable({
                    destroy: true,
                    data: response.statusData,
                    columns: [
                        { data: 'status_id' },
                        { data: 'status_name' },
                        { data: 'date_created' },
                        { data: 'date_updated' }
                    ],
                    responsive: true,
                    processing: true,
                });
                // material table
                $('#materialTable').DataTable({
                    destroy: true,
                    data: response.materials,
                    columns: [
                        { data: 'material_id' },
                        { data: 'material_name' },
                        { data: 'date_created' },
                        { data: 'date_updated' }
                    ],
                    responsive: true,
                    processing: true,
                });
                // traction table
                $('#tractionTable').DataTable({
                    destroy: true,
                    data: response.tractions,
                    columns: [
                        { data: 'traction_id' },
                        { data: 'traction_name' },
                        { data: 'date_created' },
                        { data: 'date_updated' }
                    ],
                    responsive: true,
                    processing: true,
                });
                // support table
                $('#supportTable').DataTable({
                    destroy: true,
                    data: response.supports,
                    columns: [
                        { data: 'support_id' },
                        { data: 'support_name' },
                        { data: 'date_created' },
                        { data: 'date_updated' }
                    ],
                    responsive: true,
                    processing: true,
                });
                // technology table
                $('#technologyTable').DataTable({
                    destroy: true,
                    data: response.technologies,
                    columns: [
                        { data: 'technology_id' },
                        { data: 'technology_name' },
                        { data: 'date_created' },
                        { data: 'date_updated' }
                    ],
                    responsive: true,
                    processing: true,
                });
                // size table
                $('#sizeTable').DataTable({
                    destroy: true,
                    data: response.sizes,
                    columns: [
                        { data: 'size_id' },
                        { data: 'size_name' },
                        { data: 'date_created' },
                        { data: 'date_updated' }
                    ],
                    responsive: true,
                    processing: true,
                });
                $('#rolesTable').DataTable({
                    destroy: true,
                    data: response.roles,
                    columns: [
                        { data: 'roles_id' },
                        { data: 'roles_name' },
                        { data: 'roles_desc' },
                        { data: 'date_created' },
                        { data: 'date_updated' }
                    ],
                    responsive: true,
                    processing: true,
                });
            },
        });
    });  
}



function clearInputs() {
    document.getElementById("brandID").value = "";
    document.getElementById("brandEdit").value = "";
    document.getElementById("brandIDAdd").value = "";
    document.getElementById("brandAdd").value = "";
    document.getElementById("brandDelete").value = "";
    
    document.getElementById("categoryID").value = "";
    document.getElementById("categoryEdit").value = "";
    document.getElementById("categoryIDAdd").value = "";
    document.getElementById("categoryAdd").value = "";
    document.getElementById("categoryDelete").value = "";

    document.getElementById("shoesGenderID").value = "";
    document.getElementById("shoesGenderEdit").value = "";
    document.getElementById("shoesGenderIDAdd").value = "";
    document.getElementById("shoesGenderAdd").value = "";
    document.getElementById("shoesGenderDelete").value = "";

    document.getElementById("statusID").value = "";
    document.getElementById("statusEdit").value = "";
    document.getElementById("statusIDAdd").value = "";
    document.getElementById("statusAdd").value = "";
    document.getElementById("statusDelete").value = "";

    document.getElementById("materialID").value = "";
    document.getElementById("materialEdit").value = "";
    document.getElementById("materialIDAdd").value = "";
    document.getElementById("materialAdd").value = "";
    document.getElementById("materialDelete").value = "";

    document.getElementById("tractionID").value = "";
    document.getElementById("tractionEdit").value = "";
    document.getElementById("tractionIDAdd").value = "";
    document.getElementById("tractionAdd").value = "";
    document.getElementById("tractionDelete").value = "";

    document.getElementById("supportID").value = "";
    document.getElementById("supportEdit").value = "";
    document.getElementById("supportIDAdd").value = "";
    document.getElementById("supportAdd").value = "";
    document.getElementById("supportDelete").value = "";

    document.getElementById("technologyID").value = "";
    document.getElementById("technologyEdit").value = "";
    document.getElementById("technologyIDAdd").value = "";
    document.getElementById("technologyAdd").value = "";
    document.getElementById("technologyDelete").value = "";

    document.getElementById("sizeID").value = "";
    document.getElementById("sizeEdit").value = "";
    document.getElementById("sizeIDAdd").value = "";
    document.getElementById("sizeAdd").value = "";
    document.getElementById("sizeDelete").value = "";

    document.getElementById("userRolesID").value = "";
    document.getElementById("userRolesEdit").value = "";
    document.getElementById("userRolesIDAdd").value = "";
    document.getElementById("userRolesAdd").value = "";
    document.getElementById("userRolesDelete").value = "";

}

function closeModal() {
    $('#addBrandModal').modal('hide');
    $('#editBrandModal').modal('hide');
    $('#deleteBrandModal').modal('hide');

    $('#addCategoryModal').modal('hide');
    $('#editCategoryModal').modal('hide');
    $('#deleteCategoryModal').modal('hide');

    $('#addGenderModal').modal('hide');
    $('#editGenderModal').modal('hide');
    $('#deleteGenderModal').modal('hide');

    $('#addStatusModal').modal('hide');
    $('#editStatusModal').modal('hide');
    $('#deleteStatusModal').modal('hide');

    $('#MaterialModal').modal('hide');
    $('#editMaterialModal').modal('hide');
    $('#deleteMaterialModal').modal('hide');

    $('#TractionModal').modal('hide');
    $('#editTractionModal').modal('hide');
    $('#deleteTractionModal').modal('hide');

    $('#SupportModal').modal('hide');
    $('#editSupportModal').modal('hide');
    $('#deleteSupportModal').modal('hide');
    
    $('#TechnologyModal').modal('hide');
    $('#editTechnologyModal').modal('hide');
    $('#deleteTechnologyModal').modal('hide');
    
    $('#SizeModal').modal('hide');
    $('#editSizeModal').modal('hide');
    $('#deleteSizeModal').modal('hide');

    $('#addRolesModal').modal('hide');
    $('#editRolesModal').modal('hide');
    $('#deleteRolesModal').modal('hide');
}

