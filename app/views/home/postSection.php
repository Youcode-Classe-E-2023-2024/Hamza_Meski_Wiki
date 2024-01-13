<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- component -->
<div class="relative flex min-h-screen flex-col justify-center overflow-hidden  py-6 sm:py-12 mt-24">
  <div class="w-full items-center mx-auto max-w-screen-lg">
    <div class="group grid w-full grid-cols-2">
       <div>
        <div class="pr-12">
          <p class="peer mb-6 text-gray-400">
            <?php echo $data['post']->content; ?>
          </p>
          <h3 class="mb-4 font-semibold text-xl text-gray-400">tags</h3>
          <ul role="list" class="marker:text-sky-400 list-disc pl-5 space-y-3 text-slate-500">
            <?php foreach($data['postTags'] as $postTag) :?>
                <li><?php echo $postTag->name; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="pr-16 relative flex flex-col before:block before:absolute before:h-1/6 before:w-4 before:bg-blue-500 before:bottom-0 before:right-0 before:rounded-lg  before:transition-all group-hover:before:bg-orange-300 overflow-hidden">
        <div class="absolute top-0 right-0 bg-blue-500 w-4/6 px-12 py-14 flex flex-col justify-center rounded-xl group-hover:bg-sky-600 transition-all ">
          <span class="block mb-10 font-bold group-hover:text-orange-300"><?php echo $data['postCategory']->name; ?></span>
          <h2 class="text-white font-bold text-3xl">
          <?php echo $data['post']->title; ?>
          </h2>
        </div>
       <div class="text-white">hddn</div>
        <div class="rounded-xl overflow-hidden">
          <img src="<?php echo URLROOT . '/public/images/' . $data['post']->image_name; ?>" alt="">
        </div>
      </div>
    </div>
    <!-- author informations -->
    <div class="mb-6  rounded-lg bg-white p-6 border border-solid mt-8">
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <img class="mr-2 h-10 w-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1566753323558-f4e0952af115?q=80&amp;w=1921&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="profile">
          <div>
            <h3 class="text-base font-semibold text-gray-900"><?php echo $data['postAuthor']->name; ?></h3>
            <span class="block text-xs font-normal text-gray-500"><?php echo $data['postAuthor']->email; ?></span>
          </div>
        </div>
      </div>
      <div class="mt-6 flex gap-2 text-sm font-semibold text-gray-900">
        <strong>Number of published Posts:</strong>
        <div class="flex items-center gap-1">
            <ion-icon name="albums-outline" class="text-2xl"></ion-icon>
            <span class="mr-1"><?php echo $data['nmb_of_posts_by_author']; ?></span> Post
        </div>
      </div>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>