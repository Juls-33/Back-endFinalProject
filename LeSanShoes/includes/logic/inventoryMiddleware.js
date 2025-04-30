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
                    // loadTables();
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
                text: 'Error sending data',
            });
        }
    });
}