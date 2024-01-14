const manageCategoriesIndex = document.getElementById('manageCategories-index'); 
if(manageCategoriesIndex){
    /* functions */ 
    // to delte post
    function deleteCategory(id){
        fetch(URLROOT + '/ManageCategories/deleteCategory/' + id, {
            method: 'POST', 
            headers: {
                'Content-Type': 'application/json',
            }
        })
        .then(res => {
            if(res.status == 200) {
                console.log(res.status);
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Category deleted successfully",
                    showConfirmButton: false,
                    timer: 2500
                  });
            }
        })
        .then(() => {
            location.reload();
        })
    }

    // to update post
    function categoryIdAgent(id){
        const categoryIdAgent = document.getElementById('category-id-agent');
        categoryIdAgent.setAttribute('value', id);

        fetch(URLROOT + '/ManageCategories/getCategoryById/' + id)
        .then(res => res.json())
        .then(data =>{
            console.log(data);
            const categoryUpdateTitle = document.getElementById('category-update-name'); 
            categoryUpdateTitle.value = data.name;
            }
        )
    }
    
    $(document).ready(function(){
        // Initialize DataTable
        $('#categoriesTable').DataTable({
            "lengthChange": false,
            "ajax": {
                "url": URLROOT + '/ManageCategories/getCategories',
                "dataSrc": "",
                "type": 'GET',
            },
            "columns": [
                {
                    "data": "id",
                    "render": function(data) {
                        return `<div class="text-center text-blue-500 bg-blue-100 p-2 rounded">${data}</div>`;
                    }
                },
                {
                    "data": "name",
                    "render": function(data) {
                        return `<div class="text-center font-bold text-green-700 bg-green-100 p-2 rounded">${data}</div>`;
                    }
                },
                {
                    "data": "image_name",
                    "render": function(data) {
                        var imageName = data.split('_');
                        return `<div class="text-center text-purple-500 bg-purple-100 p-2 rounded">${imageName[1]}</div>`;
                    }
                },
                {
                    "data": 'id',
                    "render": function(data) {
                        return `<div class="flex justify-center">
                                    <button onclick="deleteCategory(${data})" name="btn" class="bg-red-500 p-2 rounded-md text-white hover:bg-red-600 mr-2">Delete</button>
                                    <button data-modal-target="edit-category" data-modal-toggle="edit-category" onclick="categoryIdAgent(${data})" data-modal-target="edit-modal" data-modal-toggle="edit-modal" onclick="displayEditModel(${data})" name="btn" class="bg-blue-500 p-2 rounded-md text-white hover:bg-blue-600">Update</button>
                                </div>`;
                    }
                }
            ],
            "createdRow": function(row) {
                $(row).addClass('hover:bg-sky-200');
            },
        }); 
    });
    
    
