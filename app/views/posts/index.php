<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="posts-index" class="container mx-auto my-8 p-6 bg-white border border-gray-300 shadow-md rounded-md overflow-hidden">
    <a href="" class="bg-blue-500">Add Post</a>
    <table id="postsTable" class="">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="py-3 px-4">Id</th>
                <th class="py-3 px-4">Title</th>
                <th class="py-3 px-4">Content</th>
                <th class="py-3 px-4">Image</th>
                <th class="py-3 px-4">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Your table rows go here -->
        </tbody>
    </table>

</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>