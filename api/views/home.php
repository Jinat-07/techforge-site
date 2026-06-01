<?php // api/views/home.php ?>
<section class="text-center py-12 md:py-20 flex flex-col items-center justify-center">
    
    <div class="mb-6 font-brand tracking-wider w-full max-w-lg px-2">
        <h1 class="text-4xl sm:text-5xl md:text-7xl font-black text-white tracking-widest drop-shadow-[0_4px_12px_rgba(255,255,255,0.05)]">
            TECHFORGE
        </h1>
        
        <div class="flex items-center justify-center w-full mt-2 md:mt-3">
            <div class="h-[2px] flex-grow bg-gradient-to-r from-transparent to-cyan-500"></div>
            
            <span class="text-xs sm:text-sm md:text-lg font-bold text-cyan-400 uppercase tracking-[0.3em] px-4 whitespace-nowrap">
                COMMUNITY
            </span>
            
            <div class="h-[2px] flex-grow bg-gradient-to-r from-amber-500 to-transparent"></div>
        </div>
    </div>
    
    <p class="text-sm sm:text-base md:text-lg text-gray-400 max-w-md md:max-w-xl mx-auto mt-4 px-4 font-medium tracking-wide">
        <?php echo $community['tagline']; ?>
    </p>
    
    <div class="mt-10 w-full px-4 sm:w-auto">
        <a href="/?page=members" class="w-full sm:w-auto text-center font-brand tracking-widest bg-white text-gray-950 font-black px-8 py-4 rounded-lg transition duration-300 hover:bg-cyan-400 hover:scale-[1.02] active:scale-[0.98] inline-block shadow-xl text-sm uppercase">
            Meet the Team
        </a>
    </div>
</section>

<hr class="border-gray-900 my-8 md:my-12">

<section class="px-2">
    <h2 class="text-xs font-bold font-brand tracking-[0.2em] uppercase mb-6 text-center text-gray-500">Our Core Operating Values</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
        <?php foreach ($community['values'] as $value): ?>
            <div class="bg-gray-900/40 border border-gray-900 p-4 rounded-xl text-center font-medium hover:border-cyan-500/30 hover:bg-gray-900/80 transition duration-300 text-sm md:text-base text-gray-300 tracking-wide">
                <?php echo $value; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
