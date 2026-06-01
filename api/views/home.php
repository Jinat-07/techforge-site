<?php // api/views/home.php ?>
<section class="text-center py-8 md:py-16">
    <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-4 text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">
        <?php echo $community['name']; ?>
    </h1>
    <p class="text-lg md:text-xl text-gray-400 max-w-2xl mx-auto px-2"><?php echo $community['tagline']; ?></p>
    <div class="mt-8">
        <a href="/?page=members" class="bg-cyan-500 hover:bg-cyan-600 text-gray-950 font-bold px-6 py-3 rounded-lg transition inline-block shadow-lg shadow-cyan-500/10">
            Meet the Team
        </a>
    </div>
</section>

<hr class="border-gray-900 my-8 md:my-12">

<section>
    <h2 class="text-xl md:text-2xl font-bold mb-6 text-center text-gray-200">Our Core Operating Values</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <?php foreach ($community['values'] as $value): ?>
            <div class="bg-gray-900 border border-gray-800/80 p-4 rounded-xl text-center font-medium hover:border-cyan-500/40 transition duration-300">
                <?php echo $value; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
