<nav class="bg-blue-500 p-4 fixed top-0 w-full z-10">
    <!-- <a href="<?php echo URLROOT; ?>" class="text-white text-lg font-bold">Logo</a> -->

    <div class="flex">
        <ul class="flex space-x-4">
            <li>
                <a href="<?php echo URLROOT; ?>/home/index" class="text-white hover:text-gray-300">Home</a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/categories" class="text-white hover:text-gray-300">Categories</a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/about" class="text-white hover:text-gray-300">About</a>
            </li>
        </ul>

        <!-- if the user have been login -->
        <?php if(isset($_SESSION['author'])): ?>
            <ul class="flex space-x-4 ml-4">
                <li>
                    <a href="<?php echo URLROOT; ?>/posts/index" class="text-white hover:text-gray-300">My Wikies</a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/users/logout" class="text-white hover:text-gray-300">Logout</a>
                </li>
            </ul>
        <?php endif ?>

        <?php if(isset($_SESSION['admin'])): ?>
            <ul class="flex space-x-4 ml-4">
                <li>
                    <a href="<?php echo URLROOT; ?>/dashboard/index" class="text-white hover:text-gray-300">Dashboard</a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/posts/index" class="text-white hover:text-gray-300">My Wikies</a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/users/logout" class="text-white hover:text-gray-300">Logout</a>
                </li>
            </ul>
        <?php endif ?>

        <!-- if not -->
        <?php if(!isset($_SESSION['admin']) && !isset($_SESSION['author'])):?>
            <ul class="flex space-x-4 ml-4">
                <li>
                    <a href="<?php echo URLROOT; ?>/users/register" class="text-white hover:text-gray-300">Register</a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/users/login" class="text-white hover:text-gray-300">Login</a>
                </li>
            </ul>
        <?php endif ?>
    </div>
</nav>
