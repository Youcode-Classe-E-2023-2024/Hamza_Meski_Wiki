<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- component -->
<div class="lg:px-36 mb-10 sm:mb-0 mt-10 grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        <?php foreach($data as $category): ?>
        <div class="relative group bg-gray-900 py-10 sm:py-20 px-4 flex flex-col space-y-2 items-center cursor-pointer rounded-md hover:bg-gray-900/80 hover:smooth-hover">
          <img class="w-20 h-20 object-cover object-center rounded-full" src="<?php echo URLROOT . '/public/images/' . $category->image_name ?>" alt="cuisine">
          <h4 class="text-white text-2xl font-bold capitalize text-center"><?php echo $category->name ?></h4>
          <p class="text-white/50">55 members</p>
          <p class="absolute top-2 text-white/20 inline-flex items-center text-xs">22 Online <span class="ml-2 w-2 h-2 block bg-green-500 rounded-full group-hover:animate-pulse"></span></p>
        </div>
        <?php endforeach; ?>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>