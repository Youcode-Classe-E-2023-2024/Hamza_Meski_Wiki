<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- component -->
<div class="mt-20">
  <h1 class="text-center pb-4 font-black mb-20 text-3xl text-blue-500 before:block before:absolute before:bg-sky-300  relative before:w-1/3 before:h-1 before:bottom-0 before:left-1/3">ALL CATEGORIES</h1>
  <div class="lg:px-36 mb-10 sm:mb-0 grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
          <?php foreach($data['categories'] as $category): ?>
          <div class="relative group bg-blue-500 py-10 sm:py-20 px-4 flex flex-col space-y-2 items-center cursor-pointer rounded-md hover:bg-blue-900 hover:smooth-hover">
            <img class="w-20 h-20 object-cover object-center rounded-full" src="<?php echo URLROOT . '/public/images/' . $category->image_name ?>" alt="cuisine">
            <h4 class="text-white text-2xl font-bold capitalize text-center"><?php echo $category->name ?></h4>
            <p class="text-white"><?php echo $category->post_count; ?> Wikies</p>
          </div>
          <?php endforeach; ?>
  
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>