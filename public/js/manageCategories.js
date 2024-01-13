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
                // "data": formData,
                "type": 'GET',
            },
            "columns": [
                {"data": "id"},
                {"data": "name"},
                {
                    "data": "image_name",
                    "render": function (data) {
                        var imageName = data.split('_');
    
                        return imageName[1];
                    }
                },
                {
                    data: 'id',
                    render: function(data) {
                        return `<div class="flex">
                                    <button onclick="deleteCategory(${data})" name="btn" class="bg-red-500 p-2 rounded-md text-white hover:bg-red-600 mr-2">delete</button>
                                    <button data-modal-target="edit-category" data-modal-toggle="edit-category" onclick="categoryIdAgent(${data})" data-modal-target="edit-modal" data-modal-toggle="edit-modal" onclick="displayEditModel(${data})" name="btn" class="bg-blue-500 p-2 rounded-md text-white hover:bg-blue-600 mr-2">update</button>
                                </div>`;
                    }
                }
            ], 
        }); 

        // $('#categoriesTable').css({
        //     'background-color': 'rgba(128, 0, 128, 0.5)', // Example background color
        //     'width': '700px', // Example width
        //     'higth': '500px',
        //     'display': 'flex', 
        //     'flex-direction': 'column',
        // });
    });
}