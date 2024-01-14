const archiveIndex = document.getElementById('archive-index'); 
if(archiveIndex){
    /* functions */ 
    function archivePost(id, option) {
        const formData = new FormData(); 
        formData.append('id_option', JSON.stringify([id, option]));
        fetch(URLROOT + '/archive/archivePost', {
            method: 'POST', 
            body: formData
        })
        .then(res => {
            // return res.text();
            if(res.status == 200) {
                console.log(res.status);
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: option == 1 ?  "Post archived successfully": "Post unarchived successfully",
                    showConfirmButton: false,
                    timer: 2500
                  });
            }
        })
        .then(() => {
            location.reload()
        })
    }
    
    $(document).ready(function() {
        // Initialize DataTable
        $('#archiveTable').DataTable({
            "lengthChange": false,
            "ajax": {
                "url": URLROOT + '/archive/getPosts',
                "dataSrc": "",
                "type": 'GET',
            },
            "columns": [
                {
                    "data": "id",
                    "render": function(data, type) {
                        if (type === 'display') {
                            return `<div class="flex items-center justify-center">
                                        <span class="text-center w-full text-blue-500 bg-blue-100 p-2 rounded">${data}</span>
                                    </div>`;
                        }
                        return data;
                    }
                },
                {
                    "data": "title",
                    "render": function(data, type) {
                        if (type === 'display') {
                            return `<div class="text-center font-bold text-green-500 bg-green-100 p-2 rounded">
                                        <strong>${data}</strong>
                                    </div>`;
                        }
                        return data;
                    }
                },
                {
                    "data": "status",
                    "render": function(data, type) {
                        if (type === 'display') {
                            return `<div class="flex items-center justify-center">
                                        <span class="text-center w-full text-yellow-500 bg-yellow-100 p-2 rounded">${data}</span>
                                    </div>`;
                        }
                        return data;
                    }
                },
                {
                    "data": 'id',
                    "render": function(data) {
                        return `<div class="flex space-x-2 justify-center">
                                    <button onclick="archivePost(${data}, 1)" name="btn" class="bg-red-500 p-2 rounded-md text-white hover:bg-red-600">Archive</button>
                                    <button onclick="archivePost(${data}, 0)" name="btn" class="bg-green-500 p-2 rounded-md text-white hover:bg-green-600">Unarchive</button>
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