const manageTagsIndex = document.getElementById('manageTags-index'); 
if(manageTagsIndex){
    /* functions */ 
    // to delte post
    function deleteTag(id){
        fetch(URLROOT + '/ManageTags/deleteTag/' + id, {
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
                    title: "Tag deleted successfully",
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
    function tagIdAgent(id){
        const tagIdAgent = document.getElementById('tag-id-agent');
        tagIdAgent.setAttribute('value', id);

        fetch(URLROOT + '/ManageTags/getTagById/' + id)
        .then(res => res.json())
        .then(data =>{
            console.log(data);
            const tagUpdateTitle = document.getElementById('tag-update-name'); 
            tagUpdateTitle.value = data.name;
            }
        )
    }
    
    $(document).ready(function() {
        // Initialize DataTable
        $('#tagsTable').DataTable({
            "lengthChange": false,
            "ajax": {
                "url": URLROOT + '/ManageTags/getTags',
                "dataSrc": "",
                "type": 'GET',
            },
            "columns": [
                {
                    "data": "id",
                    "render": function(data, type, row) {
                        if (type === 'display') {
                            return `<div class="flex items-center justify-center">
                                        <span class="text-center w-full text-blue-500 bg-blue-100 p-2 rounded">${data}</span>
                                    </div>`;
                        }
                        return data;
                    }
                },
                {
                    "data": "name",
                    "render": function(data, type, row) {
                        if (type === 'display') {
                            return `<div class="text-center font-bold text-green-500 bg-green-100 p-2 rounded">
                                        <strong>${data}</strong>
                                    </div>`;
                        }
                        return data;
                    }
                },
                {
                    "data": 'id',
                    "render": function(data) {
                        return `<div class="flex space-x-2 justify-center">
                                    <button onclick="deleteTag(${data})" name="btn" class="bg-red-500 p-2 rounded-md text-white hover:bg-red-600">Delete</button>
                                    <button data-modal-target="edit-tag" data-modal-toggle="edit-tag" onclick="tagIdAgent(${data})" data-modal-target="edit-modal" data-modal-toggle="edit-modal" onclick="displayEditModel(${data})" name="btn" class="bg-blue-500 p-2 rounded-md text-white hover:bg-blue-600">Update</button>
                                </div>`;
                    }
                }
            ],
            "createdRow": function(row) {
                $(row).addClass('hover:bg-sky-200');
            },
        });
    });
    
    
}