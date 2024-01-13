<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- component -->

<div id="home-index" class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
  
  <div class="m-10 flex flex-col items-center mx-auto max-w-screen-lg">
     
    <div class="header flex w-full justify-center">
    <h1 class="text-center pb-4 font-black mb-20 text-3xl text-blue-900 before:block before:absolute before:bg-sky-300  relative before:w-1/3 before:h-1 before:bottom-0 before:left-1/3">LAST POSTS</h1>
    </div>
    <div class="grid gap-10 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
      <!--  -->
      <?php for($i = 0; $i < 6; $i++): ?>
        <?php if(isset($data[$i])): ?>
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
        <?php endif; ?>
      <?php endfor; ?>
      <!--  -->

    </div>
    <div class="header flex w-full justify-center">
      <a href="<?php echo URLROOT; ?>/home/filteredIndex" class="pb-10 mb-20 text-2xl text-blue-900 before:block before:absolute before:bg-sky-300  relative before:w-1/3 before:h-1 before:bottom-0 before:left-1/3 mt-10 ">Read More</a>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>