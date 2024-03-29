const postsIndex = document.getElementById('posts-index');

if(postsIndex){
    /* functions */ 
    // to delte post
    function deletePost(id){
        fetch(URLROOT + '/posts/deletePost/' + id, {
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
                    title: "Post deleted successfully",
                    showConfirmButton: false,
                    timer: 2500
                  });
            }
        })
        .then(()=>{
            location.href = (URLROOT + '/posts/index');
        })
    }

    // to update post
    function postIdAgent(id){
        const postIdAgent = document.getElementById('post-id-agent');
        postIdAgent.setAttribute('value', id);

        fetch(URLROOT + '/posts/getPostByPostId/' + id)
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
        $('#postsTable').DataTable({
            "lengthChange": false,
            "ajax": {
                "url": URLROOT + '/Posts/getPostsByUserId',
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
                    "data": "title",
                    "render": function(data) {
                        return `<div class="text-center font-bold text-green-700 bg-green-100 p-2 rounded">${data}</div>`;
                    }
                },
                {
                    "data": "content",
                    "render": function(data) {
                        var maxLength = 60;
    
                        var truncated = data.length > maxLength ? data.substr(0, maxLength) + '...' : data;
    
                        return `<div class="text-center text-purple-500 bg-purple-100 p-2 rounded">${truncated}</div>`;
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
                                    <button onclick="deletePost(${data})" name="btn" class="bg-red-500 p-2 rounded-md text-white hover:bg-red-600 mr-2">Delete</button>
                                    <button onclick="postIdAgent(${data})" data-modal-target="edit-modal" data-modal-toggle="edit-modal" onclick="displayEditModel(${data})" name="btn" class="bg-blue-500 p-2 rounded-md text-white hover:bg-blue-600 mr-2">Update</button>
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
