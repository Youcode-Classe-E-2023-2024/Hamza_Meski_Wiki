<?php for($i = 0; $i < count($data); $i++): ?>
    <?php if($data[$i]->status == 0): ?>
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
        <h3 class="mb-4 font-semibold  text-2xl"><a href="" class="transition-all text-blue-500 hover:text-blue-600"><?php echo $data[$i]->title; ?></a></h3>
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