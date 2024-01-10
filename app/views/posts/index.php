<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="posts-index" class="container mx-auto my-8 p-6 bg-white border border-gray-300 shadow-md rounded-md overflow-hidden">

    <!-- flow bite structure start -->
    <!-- Modal toggle -->
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Add wiki
    </button>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Create New Product
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="border-2 border-solid p-2 rounded-md">
                    <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                        <!-- START OF SELECT TAGS -->
                        <div class="md:col-span-2">
                            <label for="subject" class="float-left block  font-normal text-gray-400 text-lg">Select wiki tags :</label>
                            <main class="overflow-auto w-full h-[100px] col-span-2">
                                <div id="addFriend_section" class="bg-gray-200 ">
                                    <?php foreach($data['tags'] as $tag): ?>
                                    <main class="flex gap-1 items-center pl-2 border-b border-solid">
                                        <input type="checkbox" name="selected_users[]" value="10" class="w-5 h-5 ">
                                        <p><?php echo $tag->name; ?></p>
                                    </main>
                                    <?php endforeach; ?>
                                </div>
                            </main>
                        </div>
                        <!-- END OF SELECT TAGS -->
                        <div class="md:col-span-2 flex gap-1">
                            <input type="text" id="post-title" name="title" placeholder="Wiki Title" class="flex-1 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700">
                            <div class="flex-1">
                                <label for="post-content" class="float-left block font-normal text-gray-400 text-lg">Select category :</label>
                                <select id="post-content" name="content" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700">
                                    <option value="" disabled selected>Select a Category</option>
                                    <?php foreach($data['categories'] as $category): ?>
                                        <option value="Option-1"><?php echo $category->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
        
                        <!-- <div class="md:col-span-2">
                        </div>
                        -->
                        
                        <div class="md:col-span-2">
                            <label for="image" class="float-left block  font-normal text-gray-400 text-lg">Choose Your Wiki Pecture :</label>
                            <input type="file" id="post-image" name="image" placeholder="Upload an image" class="peer block w-full appearance-none border-none   bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0">
                        </div>
                        <div class="md:col-span-2">
                            <textarea name="content" rows="5" cols="" placeholder="Content" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700"></textarea>
                        </div>
                        <div class="md:col-span-2">
                            <button class="py-3 text-base font-medium rounded text-white bg-blue-800 w-full hover:bg-blue-700 transition duration-300">Valider</button>
                        </div>
                    </div><!-- Grid End -->
                </form>
            </div>
        </div>
    </div> 
    <!-- flow bite structure end -->

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