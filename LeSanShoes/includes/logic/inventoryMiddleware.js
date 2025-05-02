loadTables();

// ADD AND EDIT SHOE MODEL
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

// ADD NEW STOCKS
function addNewStock(){
    var form = document.getElementById('addColorwaySizeForm');
    if (!form.checkValidity()) {
        form.reportValidity(); 
        return; 
      }
    var formData = new FormData(form);
    var data = {
        action: "addColorwaySize",
        colorway_id: formData.get("colorway_id"),
        size_id: formData.get("size_id"),
        stock: formData.get("stock"),
      };
      console.log(data.colorway_id, data.size_id, data.stock);
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
                    document.getElementById("addShoeForm").reset();
                    document.getElementById("editShoeForm").reset();
                    document.getElementById("addColorwayForm").reset();

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
//DELETE SHOE MODEL
var deleteModelId = null;

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

// EDIT SHOE MODEL
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

//ADD AND EDIT COLORWAY
function addColorway() {
    var form = document.getElementById('addColorwayForm');
    if (!form.checkValidity()) {
        form.reportValidity(); 
        return; 
    }
    if (!validateAllImagesUploaded()) {
        return; 
    }
    var formData = new FormData(form);

    var formData = new FormData(form);
    formData.append("action", "addColorway");

    sendViaAJAXPOST(formData);
}

function updateColorway(){
    var form = document.getElementById('editColorwayForm');
    if (!form.checkValidity()) {
        form.reportValidity(); 
        return; 
    }
    
    var formData = new FormData(form);
    formData.append("action", "updateColorway");
    sendViaAJAXPOST(formData);
}
function sendViaAJAXPOST(formData){
    $.ajax({
        url: "../includes/logic/colorwayToDB.php", 
        type: "POST",
        data: formData,
        processData: false,  // Important: don't process the data
        contentType: false,  // Important: don't set contentType
        success: function(response) {
            try {
                const res = JSON.parse(response);
                if (res.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: res.message,
                        width: 600,
                        padding: "3em",
                        color: "#36714b"
                    });
                    document.getElementById("addColorwayForm").reset();
                    loadTables();
                    document.getElementById("addColorwayForm").reset();
                    document.getElementById("editColorwayForm").reset();
                    $('#editColorwayModal').modal('hide');
                } else {
                    Swal.fire({
                        icon: "error",
                        title: res.message,
                        width: 600,
                        padding: "3em",
                        color: "#B51E1E"
                    });
                }
            } catch (e) {
                Swal.fire({
                    icon: "error",
                    title: "Invalid response from server",
                    text: response
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

// EDIT COLORWAY
$(document).on('click', '.btn-edit-colorway', function () {
    const button = $(this);
    console.log(button.data('id'));
    $('#edit_colorway_id').val(button.data('id'));
    $('#edit_shoe_model_id').val(button.data('model'));
    $('#edit_colorway_name').val(button.data('name'));
    $('#edit_price').val(button.data('price'));

    // Set image previews
    $('#editPreview1').attr('src', button.data('image1'));
    $('#editPreview2').attr('src', button.data('image2'));
    $('#editPreview3').attr('src', button.data('image3'));
    $('#editPreview4').attr('src', button.data('image4'));

    $('#editColorwayModal').modal('show');
});



// DELETE COLORWAY 
var deleteColorwayId = null;
$(document).on('click', '.btn-delete-colorway', function () {
    deleteColorwayId = $(this).data('id');
    const colorwayName = $(this).data('name');
    $('#deleteColorwayName').text(colorwayName);

$('#confirmDeleteColorway').on('click', function () {
    if (!deleteColorwayId) return;
    $.ajax({
        url: '../includes/logic/colorwayToDB.php',
        method: 'POST',
        data: {
            action: 'deleteColorway',
            colorway_id: deleteColorwayId
        },
        dataType: 'json',
        success: function (res) {
            if (res.status=="success") {
                Swal.fire({
                    icon: "success",
                    title: res.message,
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
                $('#deleteColorwayModal').modal('hide');
                loadTables();
            }
        },
        error: function () {
            alert("Failed to delete shoe model.");
        }
    });
});
});




//ESSENTIAL FUNCTIONS
function closeModal() {
    document.getElementById("addShoeForm").reset();
    document.getElementById("editShoeForm").reset();
    document.getElementById("addColorwayForm").reset();
}

//LOAD TABLES LOAD SHOE MODEL LOAD COLORWAY
function loadTables(){
    $(document).ready(function() {
        $.ajax({
            url: '../includes/logic/inventoryGetOptions.php',
            method: 'POST',
            dataType: 'json',
            success: function(response) {
                $('#shoesTable').DataTable().clear().destroy();
                $('#colorwaySizeTable').DataTable().clear().destroy();
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
                    ],
                    responsive: true,
                    processing: true,
                });
                // colorway
                const container = $('#colorwayCardContainer');
                container.empty(); 
                
                response.colorways.forEach(item => {
                    const card = `
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h5 class="card-title mb-0">${item.colorway_name}</h5>
                                <small>Shoe Model ID ${item.model_name}</small>
                            </div>
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-6"><img src="${item.image1}" class="img-fluid rounded" /></div>
                                    <div class="col-6"><img src="${item.image2}" class="img-fluid rounded" /></div>
                                    <div class="col-6"><img src="${item.image3}" class="img-fluid rounded" /></div>
                                    <div class="col-6"><img src="${item.image4}" class="img-fluid rounded" /></div>
                                </div>
                                <p class="mt-2"><strong>Price:</strong> ₱${item.price}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <button 
                                    class="btn btn-sm btn-warning btn-edit-colorway"
                                    data-id="${item.colorway_id}"
                                    data-name="${item.colorway_name}"
                                    data-price="${item.price}"
                                    data-image1="${item.image1}"
                                    data-image2="${item.image2}"
                                    data-image3="${item.image3}"
                                    data-image4="${item.image4}">
                                    Edit
                                </button>
                                <button class="btn btn-sm btn-danger btn-delete-colorway" data-id="${item.colorway_id}" data-name="${item.colorway_name}" data-bs-toggle="modal" data-bs-target="#deleteColorwayModal" onclick="deleteColorway(${item.colorway_id})">Delete</button>
                            </div>
                        </div>
                    </div>
                    `;
                    container.append(card);
                    // onclick="editColorway(${item.colorway_id}) SA EDIT BUTTON TOH
                });
                // Stock Table for Colorway Sizes
                const colorwaySizeTable = $('#colorwaySizeTable');
                // if ($.fn.DataTable.isDataTable(colorwaySizeTable)) {
                //     colorwaySizeTable.DataTable().clear().destroy();
                // }

                colorwaySizeTable.DataTable({
                    scrollX: true,
                    destroy: true,
                    data: response.colorway_sizes,
                    columns: [
                        { data: 'colorway_size_id' },
                        { data: 'colorway_id' },
                        { data: 'size_id' },
                        { data: 'price' },
                        {
                            data: 'stock',
                            render: function(data, type, row) {
                                return `
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-sm btn-outline-secondary me-2 stock-decrease" data-id="${row.colorway_size_id}">-</button>
                                        <span class="stock-count" id="stock-count-${row.colorway_size_id}">${data}</span>
                                        <button class="btn btn-sm btn-outline-secondary ms-2 stock-increase" data-id="${row.colorway_size_id}">+</button>
                                    </div>
                                `;
                            }
                        },
                        { data: 'date_created' },
                        { data: 'date_updated' },
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `
                                    <button class="btn btn-sm btn-warning edit-stock-btn" data-id="${row.colorway_size_id}">Edit</button>
                                    <button class="btn btn-sm btn-danger delete-stock-btn" data-id="${row.colorway_size_id}">Delete</button>
                                `;
                            }
                        }
                    ]
                });
            },
        });
    });   
}
// Binding stock increase and decrease onclicks once the table loads.
$(document).ready(function () {
    loadTables();
    $('#colorwaySizeTable').on('click', '.delete-stock-btn', function () {
        const id = $(this).data('id');
        if (confirm("Are you sure you want to delete this stock entry?")) {
            $.ajax({
                url: '../includes/logic/inventoryToDB.php',
                method: 'POST',
                data: {
                    myJson: JSON.stringify({
                        action: 'deleteStock',
                        colorway_size_id: id
                    })
                },
                success: function (res) {
                    loadTables(); // Refresh after deletion
                },
                error: function () {
                    alert("Failed to delete stock.");
                }
            });
        }
    });
    // Stock increase
    $('#colorwaySizeTable').on('click', '.stock-increase', function () {
        const id = $(this).data('id');
        updateStock(id, 1);
    });
    // stock decrease
    $('#colorwaySizeTable').on('click', '.stock-decrease', function () {
        const id = $(this).data('id');
        updateStock(id, -1);
    });
    // called to update stocks in database
    function updateStock(id, change) {
        var data = {
            action: "updateStock",
            colorway_size_id: id,
            change: change
        };
        var jsonString = JSON.stringify(data);
        $.ajax({
            url: '../includes/logic/inventoryToDB.php',
            method: 'POST',
            data: { myJson : jsonString },
            success: function(res) {
                loadTables(); // Refresh the table safely
            },
            error: function() {
                alert("Stock update failed");
            }
        });
    }
});
function previewImage(input, previewId) {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById(previewId).src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
function validateAllImagesUploaded() {
    for (let i = 1; i <= 4; i++) {
        const fileInput = document.getElementById(`image${i}`);
        if (!fileInput.files || fileInput.files.length === 0) {
            Swal.fire({
                icon: "warning",
                title: `Image ${i} is required.`,
            });
            return false;
        }
    }
    return true;
}

  