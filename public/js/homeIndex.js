/* last articles in home/index */ 
const homeIndex = document.getElementById('home-index'); 
if(homeIndex) {
    console.log(homeIndex)
    const postContent = document.querySelectorAll('.post_content');
    postContent.forEach(el => {
        if(el.textContent.length > 200) {
            el.textContent = el.textContent.slice(0, 200) + ' .....';
        }else {
            el.textContent = el.textContent.slice(0, 200);
        }
    }) 
}
 
/* search bar in home/filteredIndex */ 
const homeFilteredIndex = document.getElementById('home-filtered-index');
if(homeFilteredIndex) {
    const searchForm = document.getElementById('search-form'); 
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault(); 
        const formData = new FormData(this)
        fetch(URLROOT + '/home/search', {
            method: 'POST', 
            body : formData
        })
        .then(res => res.json())
        .then(data => {
            const formData = new FormData(); 
            formData.append('formData', formData);
            fetch(URLROOT + '/home/filteredIndex', {
                method: 'POST', 
                body: formData
            })
            .then(res => res.text())
            .then(data => console.log(data));
            // .then(() => {
            //     location.href = URLROOT + '/home/filteredIndex';
            // })
        })
    })
    
}