<?php // api/views/members.php ?>
<section>
    <h1 class="text-2xl md:text-3xl font-black font-brand tracking-wider text-white uppercase">Forge Team</h1>
    <p class="text-gray-400 mb-8 text-sm md:text-base">The developers and innovators collaborating behind TechForge.</p>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <?php foreach ($community['team'] as $member): ?>
            <div class="bg-gray-900/40 border border-gray-800 p-5 rounded-xl flex justify-between items-center hover:bg-gray-900/80 transition group">
                <div>
                    <h3 class="text-lg font-semibold text-white group-hover:text-cyan-400 transition"><?php echo $member['name']; ?></h3>
                    <p class="text-xs md:text-sm text-gray-400"><?php echo $member['role']; ?></p>
                </div>
                <a href="<?php echo $member['github']; ?>" target="_blank" class="text-gray-500 hover:text-cyan-400 p-2 transition text-sm">
                    GitHub &rarr;
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
