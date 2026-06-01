<?php // api/views/home.php ?>
<section class="min-h-[70vh] flex flex-col items-center justify-center text-center py-8 md:py-12">
    
    <div class="mb-6 font-brand tracking-wider w-full max-w-lg px-4 flex flex-col items-center">
        
        <h1 class="text-4xl sm:text-5xl md:text-7xl font-black text-white tracking-[0.2em] mr-[-0.2em] drop-shadow-[0_4px_20px_rgba(255,255,255,0.05)] select-none">
            TECHFORGE
        </h1>
        
        <div class="flex items-center justify-center w-full mt-3">
            <div class="h-[2px] flex-grow bg-gradient-to-r from-transparent to-cyan-500"></div>
            
            <span class="text-xs sm:text-sm md:text-base font-bold text-cyan-400 uppercase tracking-[0.3em] mr-[-0.3em] px-4 whitespace-nowrap select-none">
                COMMUNITY
            </span>
            
            <div class="h-[2px] flex-grow bg-gradient-to-r from-amber-500 to-transparent"></div>
        </div>
    </div>
    
    <p class="text-sm sm:text-base md:text-lg text-gray-400 max-w-md md:max-w-xl mx-auto px-6 mt-2 font-medium tracking-wide leading-relaxed">
        <?php echo $community['tagline']; ?>
    </p>
    
    <div class="mt-10 w-full px-6 sm:w-auto">
        <a href="/?page=members" class="w-full sm:w-auto text-center font-brand tracking-widest bg-white text-gray-950 font-black px-8 py-4 rounded-lg transition-all duration-300 hover:bg-cyan-400 hover:shadow-[0_0_30px_rgba(34,211,238,0.25)] hover:scale-[1.02] active:scale-[0.98] inline-block shadow-xl text-xs uppercase">
            Meet the Team
        </a>
    </div>
</section>

<hr class="border-gray-900/60 my-6 md:my-10">

<section class="px-4 w-full">
    <h2 class="text-[10px] font-bold font-brand tracking-[0.25em] uppercase mb-6 text-center text-gray-500 select-none">Our Core Operating Values</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
        <?php foreach ($community['values'] as $value): ?>
            <div class="bg-gray-900/30 border border-gray-900/90 p-4 rounded-xl text-center font-medium hover:border-cyan-500/30 hover:bg-gray-900/70 transition duration-300 text-sm text-gray-300 tracking-wide">
                <?php echo $value; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
