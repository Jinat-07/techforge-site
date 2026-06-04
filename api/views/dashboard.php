<?php // api/views/dashboard.php ?>
<section class="max-w-4xl mx-auto px-2">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gray-900/40 border border-gray-900 p-6 rounded-2xl gap-4 mb-8">
        <div>
            <span class="text-[10px] font-brand tracking-[0.2em] text-cyan-400 font-bold block uppercase mb-1">Authenticated Session</span>
            <h1 class="text-2xl font-black font-brand tracking-wide text-white uppercase">Welcome, <?php echo htmlspecialchars($current_member['name']); ?></h1>
            <p class="text-xs text-gray-500 mt-1 font-mono">ID Identification Node: <?php echo htmlspecialchars($current_member['id']); ?></p>
        </div>
        <a href="/?page=logout" class="w-full sm:w-auto text-center border border-red-900/60 hover:bg-red-950/40 text-red-400 font-brand tracking-widest text-xs font-bold px-4 py-2.5 rounded-lg transition duration-200 uppercase">
            Terminate Session
        </a>
    </div>

    <?php if (isset($_GET['success'])): ?>
        <div class="bg-emerald-950/50 border border-emerald-900 text-emerald-400 px-4 py-3 rounded-xl text-sm mb-6 font-medium">
            ✓ <?php echo htmlspecialchars($_GET['success']); ?>
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['error'])): ?>
        <div class="bg-red-950/50 border border-red-900 text-red-400 px-4 py-3 rounded-xl text-sm mb-6 font-medium">
            ✕ <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <div class="bg-gray-900/20 border border-gray-900/80 p-6 rounded-2xl">
            <h3 class="text-sm font-black font-brand tracking-widest text-white uppercase mb-4 border-b border-gray-900 pb-2">Modify Forge Profile</h3>
            <form action="/?page=update_handler" method="POST" class="space-y-4">
                <div>
                    <label class="block text-[10px] font-brand tracking-widest text-gray-500 uppercase mb-1">Display Public Name</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($current_member['name']); ?>" required 
                        class="w-full bg-gray-950 border border-gray-900 text-white text-sm px-4 py-2.5 rounded-xl focus:outline-none focus:border-cyan-500 transition">
                </div>
                <div>
                    <label class="block text-[10px] font-brand tracking-widest text-gray-500 uppercase mb-1">Assigned Community Role</label>
                    <input type="text" name="role" value="<?php echo htmlspecialchars($current_member['role']); ?>" required 
                        class="w-full bg-gray-950 border border-gray-900 text-white text-sm px-4 py-2.5 rounded-xl focus:outline-none focus:border-cyan-500 transition">
                </div>
                <div>
                    <label class="block text-[10px] font-brand tracking-widest text-gray-500 uppercase mb-1">GitHub Address Link</label>
                    <input type="url" name="github" value="<?php echo htmlspecialchars($current_member['github']); ?>" required 
                        class="w-full bg-gray-950 border border-gray-900 text-white text-sm px-4 py-2.5 rounded-xl focus:outline-none focus:border-cyan-500 transition font-mono">
                </div>
                <button type="submit" class="w-full font-brand tracking-widest bg-cyan-500 text-gray-950 font-black py-3 rounded-xl transition text-xs uppercase hover:bg-cyan-400">
                    Push Profile Updates
                </button>
            </form>
        </div>

        <div class="bg-gray-900/20 border border-gray-900/80 p-6 rounded-2xl">
            <h3 class="text-sm font-black font-brand tracking-widest text-white uppercase mb-4 border-b border-gray-900 pb-2">Deploy Project Build</h3>
            <form action="/?page=project_handler" method="POST" class="space-y-4">
                <div>
                    <label class="block text-[10px] font-brand tracking-widest text-gray-500 uppercase mb-1">Project Title</label>
                    <input type="text" name="title" placeholder="e.g. AI Workflow Core" required 
                        class="w-full bg-gray-950 border border-gray-900 text-white text-sm px-4 py-2.5 rounded-xl focus:outline-none focus:border-cyan-500 transition">
                </div>
                <div>
                    <label class="block text-[10px] font-brand tracking-widest text-gray-500 uppercase mb-1">Development Phase Status</label>
                    <select name="status" class="w-full bg-gray-950 border border-gray-900 text-white text-sm px-4 py-2.5 rounded-xl focus:outline-none focus:border-cyan-500 transition">
                        <option value="Planning">Planning Phase</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed / Live</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-brand tracking-widest text-gray-500 uppercase mb-1">Operational Summary Abstract</label>
                    <textarea name="description" rows="3" placeholder="Describe the project scope and tech stack..." required 
                        class="w-full bg-gray-950 border border-gray-900 text-white text-sm px-4 py-2.5 rounded-xl focus:outline-none focus:border-cyan-500 transition resize-none"></textarea>
                </div>
                <button type="submit" class="w-full font-brand tracking-widest bg-white text-gray-950 font-black py-3 rounded-xl transition text-xs uppercase hover:bg-gray-200">
                    Register Project Row
                </button>
            </form>
        </div>

    </div>
</section>
