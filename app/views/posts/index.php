<?php require APPROOT . '/views/inc/header.php'; ?>

    <!-- main content -->
    <main id="posts-index" class="">
        <!-- left sidebar -->
        <aside id="sidebar"
            class="w-[60px] lg:w-[240px] h-[calc(100vh-120px)] whitespace-nowrap fixed shadow overflow-x-hidden transition-all duration-500 ease-in-out">
            <div class="flex flex-col justify-between h-full">
                <ul class="flex flex-col gap-1 mt-2">

                    <li data-modal-target="create-modal" data-modal-toggle="create-modal" class="text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                        <a class="w-full flex items-center py-3" href="#">
                        <i class="fa-solid fa-folder text-center px-5"></i>
                            <span class="whitespace-nowrap pl-1">Create Wiki</span>
                        </a>
                    </li>

                    <li data-modal-target="edit-modal" data-modal-toggle="edit-modal" class="text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                        <a class="w-full flex items-center py-3" href="#">
                        <i class="fa-solid fa-folder text-center px-5"></i>
                            <span class="whitespace-nowrap pl-1">Edit Wiki</span>
                        </a>
                    </li>
                </ul>

                <ul class="flex flex-col gap-1 mt-2">
                    <li class="text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                        <a class="w-full flex items-center py-3" href="#">
                            <i class="fa-solid fa-right-from-bracket text-center px-5"></i>
                            <span class="pl-1">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- main-section -->
        <section class="w-[100wh-60px] lg:w-[100wh-250px] ml-[60px] lg:ml-[240px] p-5 right-0 transition-all duration-500 ease-in-out">
            <!-- flow bite structure start -->
            <!-- Create modal -->
            <div id="create-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Create wiki
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="create-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form id="add-post-form" class="border-2 border-solid p-4 rounded-md bg-white">
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                                <!-- SELECT TAGS -->
                                <div class="md:col-span-2">
                                    <label for="subject" class="block font-normal text-gray-600 text-lg">Select wiki tags:</label>
                                    <div class="overflow-auto w-full h-[100px]">
                                        <?php foreach($data['tags'] as $tag): ?>
                                            <div class="flex items-center gap-2 pl-2 border-b border-solid">
                                                <input type="checkbox" name="selected_tags[]" value="<?php echo $tag->id; ?>" class="w-5 h-5">
                                                <p class="text-gray-800"><?php echo $tag->name; ?></p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <!-- END OF SELECT TAGS -->

                                <div class="md:col-span-2 flex gap-4">
                                    <input type="text" id="post-title" name="title" placeholder="Wiki Title" class="flex-1 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700" required>
                                    <div class="flex-1">
                                        <label for="post-content" class="block font-normal text-gray-600 text-lg">Select category:</label>
                                        <select id="post-category" name="category_id" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700" required>
                                            <option value="" disabled selected>Select a Category</option>
                                            <?php foreach($data['categories'] as $category): ?>
                                                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="image" class="block font-normal text-gray-600 text-lg">Choose Your Wiki Picture:</label>
                                    <input type="file" id="post-image" name="image" class="w-full py-2.5 px-3 focus:outline-none text-gray-900" required>
                                </div>

                                <div class="md:col-span-2">
                                    <textarea id="post-content" name="content" rows="5" placeholder="Content" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700" required></textarea>
                                </div>

                                <div class="md:col-span-2">
                                    <button class="py-3 text-base font-medium rounded text-white bg-blue-800 w-full hover:bg-blue-700 transition duration-300">Submit</button>
                                </div>
                            </div><!-- Grid End -->
                        </form>

                    </div>
                </div>
            </div> 
            <!-- Edit modal -->
            <div id="edit-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Edit wiki
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form id="update-post-form" class="border-2 border-solid p-4 rounded-md bg-white">
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                                <!-- SELECT TAGS -->
                                <div class="md:col-span-2">
                                    <label for="subject" class="block font-normal text-gray-600 text-lg">Select wiki tags:</label>
                                    <div class="overflow-auto w-full h-[100px]">
                                        <?php foreach($data['tags'] as $tag): ?>
                                            <div class="flex items-center gap-2 pl-2 border-b border-solid">
                                                <input type="checkbox" name="selected_tags[]" class="w-5 h-5">
                                                <p class="text-gray-800"><?php echo $tag->name; ?></p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <!-- END OF SELECT TAGS -->

                                <div class="md:col-span-2 flex gap-4">
                                    <input type="text" id="post-title" name="title" placeholder="Wiki Title" class="flex-1 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700" required>
                                    <div class="flex-1">
                                        <label for="post-content" class="block font-normal text-gray-600 text-lg">Select category:</label>
                                        <select id="post-category" name="category" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700">
                                            <option value="" disabled selected>Select a Category</option>
                                            <?php foreach($data['categories'] as $category): ?>
                                                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="image" class="block font-normal text-gray-600 text-lg">Choose Your Wiki Picture:</label>
                                    <input type="file" id="post-image" name="image" class="w-full py-2.5 px-3 focus:outline-none text-gray-900">
                                </div>

                                <div class="md:col-span-2">
                                    <textarea name="content" rows="5" placeholder="Content" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700"></textarea>
                                </div>

                                <div class="md:col-span-2">
                                    <button class="py-3 text-base font-medium rounded text-white bg-blue-800 w-full hover:bg-blue-700 transition duration-300">Submit</button>
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
        </section>
    </main>
<?php require APPROOT . '/views/inc/footer.php'; ?>