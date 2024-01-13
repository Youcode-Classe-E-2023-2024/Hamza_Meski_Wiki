<?php require APPROOT . '/views/inc/header.php'; ?>

    <!-- main content -->
    <main id="manageTags-index" class="mt-24">
        <!-- left sidebar -->
        <aside id="sidebar"
            class="w-[60px] lg:w-[240px] h-[calc(100vh-120px)] whitespace-nowrap fixed shadow overflow-x-hidden transition-all duration-500 ease-in-out">
            <div class="flex flex-col justify-between h-full border border-blue-500 border-solid">
                <ul class="flex flex-col gap-1 mt-2">
                    
                    <li data-modal-target="create-tag" data-modal-toggle="create-tag" class="text-blue-500 hover:bg-blue-100 hover:text-blue-500">
                        <a class="w-full flex items-center py-3" href="#">
                        <i class="fa-solid fa-folder text-center px-5"></i>
                            <span class="whitespace-nowrap pl-1">Create Tag</span>
                        </a>
                    </li>
          
                </ul>
            </div>
        </aside>

        <!-- main-section -->
        <section class="w-[100wh-60px] lg:w-[100wh-250px] ml-[60px] lg:ml-[240px] p-5 right-0 transition-all duration-500 ease-in-out">
            <!-- flow bite structure start -->
            <!-- Create modal -->
            <div id="create-tag" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Create tag
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="create-tag">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form id="add-tag-form" class="border-2 border-solid p-4 rounded-md bg-white">
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                                <div class="md:col-span-2 flex gap-4">
                                    <input type="text" name="tag_name" placeholder="Tag name" class="flex-1 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700" required>
                                </div>

                                <div class="md:col-span-2">
                                    <button type="submit" class="py-3 text-base font-medium rounded text-white bg-blue-800 w-full hover:bg-blue-700 transition duration-300">Submit</button>
                                </div>
                            </div><!-- Grid End -->
                        </form>

                    </div>
                </div>
            </div> 
            <!-- Edit modal -->
            <div id="edit-tag" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Edit tag
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-tag">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form id="update-tag-form" class="border-2 border-solid p-4 rounded-md bg-white">
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-6">

                                <input id="tag-id-agent" type="hidden" name="tag_id">
                                <div class="md:col-span-2 flex gap-4">
                                    <label class="block font-normal text-gray-600 text-lg">Tag Name:</label>
                                    <input type="text" id="tag-update-name" name="tag_name" placeholder="Tag name" class="flex-1 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700" required>
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

            <table id="tagsTable" class="">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="py-3 px-4 align-middle">Id</th>
                        <th class="py-3 px-4 align-middle">Name</th>
                        <th class="py-3 px-4 align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Your table rows go here -->
                </tbody>
            </table>
        </section>
    </main>
<?php require APPROOT . '/views/inc/footer.php'; ?>