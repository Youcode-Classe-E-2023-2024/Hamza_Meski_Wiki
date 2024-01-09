// const postsIndex = document.getElementById('posts-index');
// if(postsIndex){
//     $(document).ready(function(){
//         // Initialize DataTable
//         $('#postsTable').DataTable({
//             "ajax": {
//                 "url": URLROOT + '/Posts/displayPosts/',
//                 "dataSrc": "",
//                 // "data": formData,
//                 "type": 'GET',
//             },
//             "columns": [
//                 {"data": "id"},
//                 {"data": "userId"},
//                 {"data": "title"},
//                 {"data": "body"},
//                 {
//                     data: 'id',
//                     render: function(data) {
//                         return `<button onclick="deletePost(${data})" name="btn" class="text-red-500 hover:underline mr-2">delete</button>` +
//                             `<a href="${URLROOT}/ManagePosts/editPost/${data}" class="delete_btn text-blue-500 hover:underline focus:outline-none focus:ring focus:border-red-300" data-id="' + data + '">edit</a>`;
//                     }
//                 }
//             ]
//         }); 
//     });
// }