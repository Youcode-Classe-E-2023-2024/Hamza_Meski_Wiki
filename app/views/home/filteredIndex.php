<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- component -->

<div id="home-index" class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
  
  <div class="m-10 flex flex-col items-center mx-auto max-w-screen-lg">
    <!-- search bar component -->
    <form id="search-form" class="flex  bg-blue-600 p-2 mb-14 ">   
        <select id="category" name="search_by" class="form-select py-2 px-4 block leading-5 rounded-tl-md rounded-bl-md transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    <option value="title">title</option>
                    <option value="category">category</option>
                    <option value="tag">tag</option>
                    <!-- Add more options as needed -->
        </select>
        <div class="relative w-full cursor-pointer">
            <input name="search_input" type="text" id="simple-search" class="rounded-tr-md rounded-br-md  border  text-sm focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search branch name..." required>
        </div>
        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </button>
    </form>
    <!-- search -->
    <div class="grid gap-10 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
      <!--  -->
      <?php for($i = 0; $i < count($data); $i++): ?>
      <div class="bg-white w-full rounded-lg shadow-md flex flex-col transition-all overflow-hidden hover:shadow-2xl">
        <div class="  p-6">

          <div class="pb-3 mb-4 border-b border-stone-200 text-xs font-medium flex justify-between text-blue-900">
            <span class="flex items-center gap-1">
              <ion-icon name="time-outline" class="text-2xl"></ion-icon>
              <?php echo $data[$i]->created_at; ?>
            </span>
            <a href="<?php echo URLROOT ?>/home/postSection/<?php echo $data[$i]->id; ?>">
              Read More
            </a>
          </div>
          <h3 class="mb-4 font-semibold  text-2xl"><a href="" class="transition-all text-blue-900 hover:text-blue-600"><?php echo $data[$i]->title; ?></a></h3>
          <p class="post_content" class="text-sky-800 text-sm mb-0">
            <?php echo $data[$i]->content ?>
          </p>
        </div>
        <div class="mt-auto">
          <img src="<?php echo URLROOT; ?>/public/images/<?php echo $data[$i]->image_name ?>" alt="" class="w-full h-48 object-cover">
        </div>
      </div>
      <?php endfor; ?>
      <!--  -->

    </div>
    
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>