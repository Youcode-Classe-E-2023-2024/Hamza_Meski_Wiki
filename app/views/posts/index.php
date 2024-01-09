<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="posts-index"></div>
    <table id="postsTable" class="min-w-full bg-white border border-gray-300 shadow-md rounded-md overflow-hidden">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="py-2 px-4">Id</th>
                <th class="py-2 px-4">Title</th>
                <th class="py-2 px-4">Content</th>
                <th class="py-2 px-4">Image</th>
                <th class="py-2 px-4">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
<?php require APPROOT . '/views/inc/footer.php'; ?>