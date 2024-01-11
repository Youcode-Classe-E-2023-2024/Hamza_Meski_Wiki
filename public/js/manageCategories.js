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
        const postIdAgent = document.getElementById('post-id-agent');
        postIdAgent.setAttribute('value', id);

        fetch(URLROOT + '/ManageCategories/getCategoryByCatId/' + id)
        .then(res => res.json())
        .then(data =>{
            // console.log(data);
            const postUpdateTitle = document.getElementById('post-update-title'); 
            const postUPdateContent = document.getElementById('post-update-content');
            console.log(postUpdateTitle); 
            console.log(postUPdateContent);
            postUpdateTitle.value = data.title;
            postUPdateContent.value = data.content;
            }
        )
    }
    
    $(document).ready(function(){
        // Initialize DataTable
        $('#categoriesTable').DataTable({
            "ajax": {
                "url": URLROOT + '/ManageCategories/getCategories',
                "dataSrc": "",
                // "data": formData,
                "type": 'GET',
            },
            "columns": [
                {"data": "id"},
                {"data": "name"},
                {"data": "image_name"},
                {
                    data: 'id',
                    render: function(data) {
                        return `<div class="flex">
                                    <button onclick="deleteCategory(${data})" name="btn" class="bg-red-500 p-2 rounded-md text-white hover:bg-red-600 mr-2">delete</button>
                                    <button onclick="postIdAgent(${data})" data-modal-target="edit-modal" data-modal-toggle="edit-modal" onclick="displayEditModel(${data})" name="btn" class="bg-blue-500 p-2 rounded-md text-white hover:bg-blue-600 mr-2">update</button>
                                </div>`;
                    }
                }
            ]
        }); 
    });
} 
