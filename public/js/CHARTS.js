const CHARTS = document.getElementById('CHARTS');
if(CHARTS) {
    /************ Fetch users and posts data ***************/
    const usersPromise = fetch(URLROOT + '/Users/getUsers').then(response => response.json());
    const postsPromise = fetch(URLROOT + '/Posts/getPosts').then(response => response.json());
    
    /************ graph1  **************/
    Promise.all([usersPromise, postsPromise])
        .then(([users, posts]) => {

            // Create a mapping of user IDs to post counts
            const userPostCount = {};
            posts.forEach(post => {
                if (userPostCount[post.user_id]) {
                    userPostCount[post.user_id]++;
                } else {
                    userPostCount[post.user_id] = 1;
                }
            });

            // Extract relevant data for the plot
            const usernames = users.map(user => user.username);
            const postCounts = usernames.map(username => userPostCount[users.find(user => user.username === username).id] || 0);

            // Create a bar chart using Plotly
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
            Plotly.newPlot('chart1', [trace], layout, config);
        })
        .catch(error => console.error('Error fetching data:', error));
    
}