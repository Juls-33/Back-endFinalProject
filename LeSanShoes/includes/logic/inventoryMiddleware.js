loadTables();
function newShoeModel() {
    var form = document.getElementById('addShoeForm');
    if (!form.checkValidity()) {
        form.reportValidity(); 
        return; 
      }
    var formData = new FormData(form);

    var data = {
        action: "addShoeModel",
        brand_id: formData.get("brand_id"),
        category_id: formData.get("category_id"),
        material_id: formData.get("material_id"),
        traction_id: formData.get("traction_id"),
        support_id: formData.get("support_id"),
        technology_id: formData.get("technology_id"),
        model_name: formData.get("model_name"),
        description: formData.get("description")
      };
    sendViaAJAX(data);
}

function editShoeModel() {
    var form = document.getElementById('editShoeForm');
    if (!form.checkValidity()) {
        form.reportValidity(); 
        return; 
      }
    var formData = new FormData(form);

    var data = {
        action: "editShoeModel",
        shoe_model_id: formData.get("shoe_model_id"),
        brand_id: formData.get("brand_id"),
        category_id: formData.get("category_id"),
        material_id: formData.get("material_id"),
        traction_id: formData.get("traction_id"),
        support_id: formData.get("support_id"),
        technology_id: formData.get("technology_id"),
        model_name: formData.get("model_name"),
        description: formData.get("description")
      };
    sendViaAJAX(data);
}

function sendViaAJAX(data){
    var jsonString = JSON.stringify(data);
    //sending to php and receiving response from server
    $.ajax({
        url: "../includes/logic/inventoryToDB.php", 
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
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: 'Error sending data',
            });
        }
    });
}


function loadTables(){
    $(document).ready(function() {
        $.ajax({
            url: '../includes/logic/inventoryGetOptions.php',
            method: 'POST',
            dataType: 'json',
            success: function(response) {
                $('#shoesTable').DataTable().clear().destroy();
                // Brand Table
                $('#shoesTable').DataTable({
                    scrollX: true,
                    destroy: true,
                    data: response.shoe_models,
                    columns: [
                        { data: 'shoe_model_id' },
                        { data: 'model_name' },
                        { data: 'description' },
                        { data: 'brand_name' },
                        { data: 'category_name' },
                        { data: 'material_name' },
                        { data: 'traction_name' },
                        { data: 'support_name' },
                        { data: 'technology_name' },
                        { data: 'date_created' },
                        { data: 'date_updated' },
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `
                                    <button class="btn btn-sm btn-primary edit-btn" data-id="${row.shoe_model_id}">Edit</button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="${row.shoe_model_id}" data-name="${row.model_name}" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                `;
                            }
                        }
                    ]
                });
            },
        });
    });   
}

let deleteModelId = null;

$(document).on('click', '.delete-btn', function () {
    deleteModelId = $(this).data('id');
    const modelName = $(this).data('name');
    $('#deleteModelName').text(modelName);
});

$('#confirmDeleteBtn').on('click', function () {
    if (!deleteModelId) return;
    var jsonStringDel = JSON.stringify({ shoe_model_id: deleteModelId, action: 'deleteShoeModel' });
    $.ajax({
        url: '../includes/logic/inventoryToDB.php',
        method: 'POST',
        data: {myJson : jsonStringDel},
        success: function (res) {
            $('#deleteModal').modal('hide');
            loadTables();
        },
        error: function () {
            alert("Failed to delete shoe model.");
        }
    });
});

// EDIT
$(document).on('click', '.edit-btn', function () {
    const data = $('#shoesTable').DataTable().row($(this).parents('tr')).data();

    $('#edit_model_id').val(data.shoe_model_id);
    $('#edit_model_name').val(data.model_name);
    $('#edit_description').val(data.description);

    // Match the actual select IDs in the form
    $('#brandSelect').val(data.brand_name.split(":")[0]);
    $('#categorySelect').val(data.category_name.split(":")[0]);
    $('#materialSelect').val(data.material_name.split(":")[0]);
    $('#tractionSelect').val(data.traction_name.split(":")[0]);
    $('#supportSelect').val(data.support_name.split(":")[0]);
    $('#technologySelect').val(data.technology_name.split(":")[0]);

    $('#editModal').modal('show');
});

  