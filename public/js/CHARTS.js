const CHARTS = document.getElementById('CHARTS');
if(CHARTS) {
    const chart1 = document.getElementById('CHART1'); 
    const chart2 = document.getElementById('CHART2'); 
    const chart3 = document.getElementById('CHART3');
    // bar chart 
    fetch(URLROOT + '/posts/postsByEachUser')
    .then(res => res.json())
    .then(data => {
        console.log(data)
    })
}