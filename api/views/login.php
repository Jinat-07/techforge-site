<?php // api/views/login.php ?>
<section class="min-h-[70vh] flex flex-col items-center justify-center text-center px-4">
    
    <div class="w-full max-w-md bg-gray-900/30 border border-gray-900 p-8 rounded-2xl shadow-2xl backdrop-blur-sm">
        
        <h2 class="text-2xl font-black font-brand tracking-widest text-white mb-2 uppercase">
            Forge <span class="text-cyan-400">Access</span>
        </h2>
        <div class="h-[1px] w-full bg-gradient-to-r from-transparent via-gray-800 to-transparent mb-6"></div>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-950/40 border border-red-900 text-red-400 px-4 py-2.5 rounded-xl text-xs mb-5 text-left font-medium font-mono">
                ✕ <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
        
        <form action="/?page=auth_handler" method="POST" class="space-y-5 text-left">
            
            <div>
                <label class="block text-[10px] font-brand tracking-widest text-gray-500 uppercase mb-2">Member ID Link</label>
                <input type="text" name="member_id" placeholder="e.g. TF-001" required 
                    class="w-full bg-gray-950 border border-gray-900 text-white px-4 py-3 rounded-xl focus:outline-none focus:border-cyan-500 transition font-mono text-sm">
            </div>

            <div>
                <label class="block text-[10px] font-brand tracking-widest text-gray-500 uppercase mb-2">Secure Passkey</label>
                <input type="password" name="password" placeholder="••••••••" required 
                    class="w-full bg-gray-950 border border-gray-900 text-white px-4 py-3 rounded-xl focus:outline-none focus:border-cyan-500 transition font-mono text-sm">
            </div>

            <button type="submit" class="w-full mt-4 font-brand tracking-widest bg-cyan-500 text-gray-950 font-black px-6 py-3 rounded-xl transition-all duration-300 hover:bg-cyan-400 hover:shadow-[0_0_20px_rgba(34,211,238,0.15)] text-xs uppercase">
                Initialize Login
            </button>
            
        </form>
    </div>
</section>
