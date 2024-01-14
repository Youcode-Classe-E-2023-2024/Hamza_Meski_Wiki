<?php require APPROOT . '/views/inc/header.php'; ?>

    <!-- main content -->
    <main id="archive-index" class="mt-24">
        <!-- left sidebar -->
        <aside id="sidebar"
            class="w-[60px] lg:w-[240px] h-[calc(100vh-120px)] whitespace-nowrap fixed shadow overflow-x-hidden transition-all duration-500 ease-in-out">
            <div class="flex flex-col justify-between h-full border border-blue-500 border-solid">
                <ul class="flex flex-col gap-1 mt-2">
                    
                    <li  class="text-blue-500 hover:bg-blue-100 hover:text-blue-500">
                        <a class="w-full flex items-center py-3" href="#">
                        <i class="fa-solid fa-folder text-center px-5"></i>
                            <span class="whitespace-nowrap pl-1">Archive Wiki</span>
                        </a>
                    </li>
          
                </ul>
            </div>
        </aside>

        <!-- main-section -->
        <section class="w-[100wh-60px] lg:w-[100wh-250px] ml-[60px] lg:ml-[240px] p-5 right-0 transition-all duration-500 ease-in-out">

            <table id="archiveTable" class="">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="py-3 px-4 align-middle">Id of category</th>
                        <th class="py-3 px-4 align-middle">Name of category</th>
                        <th class="py-3 px-4 align-middle">Status of category</th>
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