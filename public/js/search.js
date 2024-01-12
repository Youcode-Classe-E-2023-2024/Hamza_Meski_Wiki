const searchForm = document.getElementById('search-form'); 
if(searchForm) {
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault(); 
        const formData = new FormData(this); 
        fetch(URLROOT + '/home/filtered_index', {
            method: 'POST', 
            body: formData
        })
        .then(res => res.text())
        .then(data => console.log(data));
    })
}