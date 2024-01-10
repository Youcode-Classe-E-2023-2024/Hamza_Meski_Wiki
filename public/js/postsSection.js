const postsIndex = document.getElementById('posts-index');
/* functions */ 
function deletePost(id){
    fetch('https://jsonplaceholder.typicode.com/posts/' + id, {
        method: 'DELETE', 
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
                timer: 1500
              });
        }
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
                        return `<div class="flex gap-2"><button onclick="deletePost(${data})" name="btn" class="bg-red-500 p-2 rounded-md text-white hover:underline mr-2">delete</button>`;
                    }
                }
            ]
        }); 
    });
} 