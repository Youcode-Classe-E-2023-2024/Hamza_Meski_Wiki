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
                        return `<div class="flex gap-2"><button onclick="deletePost(${data})" name="btn" class="text-red-500 hover:underline mr-2">delete</button>` +
                            `<a href="${URLROOT}/posts/editPost/${data}" class="delete_btn text-blue-500 hover:underline focus:outline-none focus:ring focus:border-red-300" data-id="' + data + '">edit</a></div>`;
                    }
                }
            ]
        }); 
    });
} 