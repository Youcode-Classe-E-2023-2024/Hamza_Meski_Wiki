const postsIndex = document.getElementById('posts-index');
/* functions */ 
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

if(postsIndex){
    $(document).ready(function(){
        // Initialize DataTable
        $('#postsTable').DataTable({
            "ajax": {
                "url": URLROOT + '/Posts/getPostsByUserId',
                "dataSrc": "",
                // "data": formData,
                "type": 'GET',
            },
            "columns": [
                {"data": "id"},
                {"data": "title"},
                {"data": "content"},
                {"data": "image_name"},
                {
                    data: 'id',
                    render: function(data) {
                        return `<div class="flex gap-2"><button onclick="deletePost(${data})" name="btn" class="bg-red-500 p-2 rounded-md text-white hover:bg-red-600 mr-2">delete</button>`;
                    }
                }
            ]
        }); 
    });
} 