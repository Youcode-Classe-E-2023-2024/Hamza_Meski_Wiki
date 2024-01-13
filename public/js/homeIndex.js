/* last articles in home/index */ 
const homeIndex = document.getElementById('home-index'); 
const homeFilteredIndex = document.getElementById('home-filtered-index');
if(homeIndex || homeFilteredIndex) {
    controll_cards_hight();
}

function controll_cards_hight() {
    const postContent = document.querySelectorAll('.post_content');
    console.log(postContent)
    postContent.forEach(el => {
        if(el.textContent.length > 200) {
            el.textContent = el.textContent.slice(0, 200) + ' .....';
        }else {
            el.textContent = el.textContent.slice(0, 200);
        }
    }) 
}
 
/* search bar in home/filteredIndex */ 
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
            formData.append('data', JSON.stringify(data));
            fetch(URLROOT + '/home/filteredIndex', {
                method: 'POST', 
                body: formData
            })
            .then(res => res.text())
            .then(data => {
                document.getElementById('search-content').innerHTML = data;
                controll_cards_hight();
            })
        })
    })
}