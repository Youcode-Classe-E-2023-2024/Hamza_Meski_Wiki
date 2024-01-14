const CHARTS = document.getElementById('CHARTS');
if(CHARTS) {
    /************ top data  ***************/
    const totalUsers = document.getElementById('total-users'); 
    const totalWikies = document.getElementById('total-wikies'); 
    const more30 = document.getElementById('more-30');
    const archivedPosts = document.getElementById('archived-posts');
    fetch(URLROOT + '/users/getUsers').then(res => res.json()).then(data => totalUsers.textContent = data.length) // totalUsers.textContent = data.length
    fetch(URLROOT + '/posts/getPosts').then(res => res.json()).then(data => totalWikies.textContent = data.length) // totalWikies.textContent = data.length
    fetch(URLROOT + '/posts/more30').then(res => res.json()).then(data => more30.textContent = data.length)
    fetch(URLROOT + '/posts/archivedPosts').then(res => res.json()).then(data => archivedPosts.textContent = data.length)

    /************ Fetch users and posts data ***************/
    const usersPromise = fetch(URLROOT + '/Users/getUsers').then(response => response.json());
    const postsPromise = fetch(URLROOT + '/Posts/getPosts').then(response => response.json());
    const categoriesPromise = fetch(URLROOT + '/ManageCategories/getCategories').then(response => response.json());
    
    /************ graph1  **************/
    Promise.all([usersPromise, postsPromise])
        .then(([users, posts]) => {
            const userPostCount = {};
            posts.forEach(post => {
                if (userPostCount[post.user_id]) {
                    userPostCount[post.user_id]++;
                } else {
                    userPostCount[post.user_id] = 1;
                }
            });
            
            const usernames = users.map(user => user.name); 
            const postCounts = usernames.map(username => userPostCount[users.find(user => user.name === username).id] || 0); // Use 'name' instead of 'username'
            
            const trace = {
                x: usernames,
                y: postCounts,
                type: 'bar',
                text: postCounts.map(String),
                textposition: 'auto',
                marker: {
                    color: 'rgb(158,202,225)',
                    opacity: 0.7,
                    line: {
                        color: 'rgb(8,48,107)',
                        width: 1.5
                    }
                }
            };
            
            const layout = {
                title: 'Number of Posts per User',
                xaxis: {
                    title: 'Usernames'
                },
                yaxis: {
                    title: 'Number of Posts'
                }
            };
            
            const config = { responsive: true };
            
            // Plot the chart
            Plotly.newPlot('CHART1', [trace], layout, config);
            
        })
        .catch(error => console.error('Error fetching data:', error));
    
    /************ graph2  **************/
    Promise.all([categoriesPromise, postsPromise])
        .then(([categories, posts]) => {
            const categoryPostCount = {};
            posts.forEach(post => {
                if (categoryPostCount[post.category_id]) {
                    categoryPostCount[post.category_id]++;
                } else {
                    categoryPostCount[post.category_id] = 1;
                }
            });
            
            const categorynames = categories.map(category => category.name); 
            const postCounts = categorynames.map(categoryname => categoryPostCount[categories.find(category => category.name === categoryname).id] || 0); // Use 'name' instead of 'username'
            
            const trace = {
                labels: categorynames,
                values: postCounts,
                type: 'pie',
                textinfo: 'percent+label',
                insidetextorientation: 'radial'
            };
            
            const layout = {
                title: 'Distribution of Posts Among Categories'
            };
            
            const config = { responsive: true };
            
            // Plot the chart
            Plotly.newPlot('CHART2', [trace], layout, config);
            
        })
        .catch(error => console.error('Error fetching data:', error));

        /************ graph3  **************/
        Promise.all([postsPromise])
        .then(([posts]) => {
            const candlestickData = posts.map(post => ({
                x: [post.created_at],  //
                close: [post.created_at],  
                high: [post.created_at],  
                low: [post.created_at],   
                open: [post.created_at],   
                type: 'candlestick',
                name: `Post ${post.id}`,
                showlegend: false,
            }));

            const layout = {
                title: 'Candlestick Chart of Post Creation Dates',
                xaxis: {
                    title: 'Date',
                    type: 'category',
                },
                yaxis: {
                    title: 'Post',
                },
            };

            Plotly.newPlot('CHART3', candlestickData, layout);

        });

}
