<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- component -->
<a href="<?php echo URLROOT ?>/posts/index">back</a>
<div class="max-w-lg lg:ms-auto mx-auto text-center ">
    <div class="py-16 px-7 rounded-md bg-white">
                                    
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
                <div class="md:col-span-2">
                    <input type="text" id="post-title" name="title" placeholder="Wiki Title" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700">
                </div>
                <div class="md:col-span-2">
                    <label for="post-content" class="float-left block  font-normal text-gray-400 text-lg">Vous accompagner sur :</label>
                    <select id="post-content" name="content" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-700">
                        <option value="" disabled selected>Select a Category</option>
                        <?php foreach($data['categories'] as $category): ?>
                        <option value="Option-1"><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                
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
<?php require APPROOT . '/views/inc/footer.php'; ?>