const CHARTS = document.getElementById('CHARTS');
if(CHARTS) {
    /************ Fetch users and posts data ***************/
    const usersPromise = fetch(URLROOT + '/Users/getUsers').then(response => response.json());
    const postsPromise = fetch(URLROOT + '/Posts/getPosts').then(response => response.json());
    
    /************ graph1  **************/
    Promise.all([usersPromise, postsPromise])
        .then(([users, posts]) => {
            console.log(users); 
            console.log(posts);
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
                labels: usernames,
                values: postCounts,
                type: 'pie',
                textinfo: 'percent+label',
                insidetextorientation: 'radial'
            };
            
            const layout = {
                title: 'Distribution of Posts Among Users'
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