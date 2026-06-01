<?php // api/views/projects.php ?>
<section>
    <h1 class="text-2xl md:text-3xl font-black font-brand tracking-wider text-white uppercase">Technical Matrix</h1>
    <p class="text-gray-400 mb-8 text-sm md:text-base">Active build cycles managed by TechForge teams.</p>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach ($community['projects'] as $project): ?>
            <div class="bg-gray-900 border border-gray-800 p-6 rounded-2xl relative overflow-hidden flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-bold text-white pr-2"><?php echo $project['title']; ?></h3>
                        <span class="text-xs font-mono px-2 py-1 rounded bg-gray-800 text-cyan-400 border border-gray-700 whitespace-nowrap">
                            <?php echo $project['status']; ?>
                        </span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4"><?php echo $project['desc']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
