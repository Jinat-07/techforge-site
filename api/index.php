<?php
// ---------------------------------------------------------
// 1. DATA CORE (Keep your content clean & organized here)
// ---------------------------------------------------------
$community = [
    "name" => "TechForge Community",
    "tagline" => "Learn. Build. Innovate. Collaborate.",
    "values" => ["Dedication", "Consistency", "Curiosity", "Innovation", "Collaboration", "Knowledge Sharing", "Problem Solving", "Continuous Learning"],
    "team" => [
        ["name" => "Jinat Sahorior", "role" => "Founder & Lead Builder", "github" => "#"],
        ["name" => "Co-Founder Name", "role" => "Core Coordinator", "github" => "#"]
    ],
    "projects" => [
        ["title" => "Community Digital Platform", "status" => "In Progress (PHP Hub)", "desc" => "Our central gateway to display team profiles, milestones, and challenges."],
        ["title" => "Upcoming AI Collaboration", "status" => "Planning", "desc" => "A group-built technical asset integrating smart automation tools."]
    ]
];

// ---------------------------------------------------------
// 2. ROUTING LOGIC
// ---------------------------------------------------------
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Helper function to build dynamic navigation links
function nav_link($pageName, $label, $currentPage) {
    $activeClass = ($pageName === $currentPage) ? 'text-cyan-400 font-bold border-b-2 border-cyan-400' : 'text-gray-400 hover:text-white';
    $url = ($pageName === 'home') ? '/' : '/?page=' . $pageName;
    return "<a href='{$url}' class='px-3 py-2 transition {$activeClass}'>{$label}</a>";
}

// ---------------------------------------------------------
// 3. PAGE VIEW RENDERING
// ---------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $community['name'] . " | " . ucfirst($page); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-gray-100 font-sans min-h-screen flex flex-col">

    <header class="border-b border-gray-800 bg-gray-900/50 backdrop-blur sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-black tracking-wider text-cyan-400">TECH<span class="text-white">FORGE</span></a>
            <nav class="flex space-x-4">
                <?php 
                    echo nav_link('home', 'Home', $page);
                    echo nav_link('task', 'Screening Task', $page);
                    echo nav_link('projects', 'Projects', $page);
                ?>
            </nav>
        </div>
    </header>

    <main class="flex-grow max-w-5xl w-full mx-auto px-6 py-12">
        <?php if ($page === 'home'): ?>
            <section class="text-center py-12">
                <h1 class="text-5xl font-extrabold tracking-tight mb-4 text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">
                    <?php echo $community['name']; ?>
                </h1>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto"><?php echo $community['tagline']; ?></p>
                <div class="mt-8">
                    <a href="/?page=task" class="bg-cyan-500 hover:bg-cyan-600 text-gray-950 font-bold px-6 py-3 rounded-lg transition shadow-lg shadow-cyan-500/20">
                        Join the Forge
                    </a>
                </div>
            </section>

            <hr class="border-gray-800 my-12">

            <section>
                <h2 class="text-2xl font-bold mb-6 text-center">Our Core Operating Values</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <?php foreach ($community['values'] as $value): ?>
                        <div class="bg-gray-900 border border-gray-800 p-4 rounded-xl text-center font-medium hover:border-cyan-500/50 transition">
                            <?php echo $value; ?>
                        </div>
                    <?php endstyle; ?>
                    <?php endforeach; ?>
                </div>
            </section>

            <hr class="border-gray-800 my-12">

            <section>
                <h2 class="text-2xl font-bold mb-6">Core Drivers</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <?php foreach ($community['team'] as $member): ?>
                        <div class="bg-gray-900/50 border border-gray-800 p-6 rounded-xl flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-semibold text-white"><?php echo $member['name']; ?></h3>
                                <p class="text-sm text-gray-400"><?php echo $member['role']; ?></p>
                            </div>
                            <a href="<?php echo $member['github']; ?>" class="text-cyan-400 hover:underline text-sm">GitHub &rarr;</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

        <?php elseif ($page === 'task'): ?>
            <section class="max-w-3xl mx-auto">
                <span class="text-xs font-bold tracking-widest text-cyan-400 uppercase bg-cyan-950/50 border border-cyan-800 px-3 py-1 rounded-full">Phase 01: Onboarding</span>
                <h1 class="text-3xl font-bold mt-4 mb-6">Initial Screening Challenge</h1>
                <div class="bg-gray-900 border border-gray-800 p-6 rounded-2xl space-y-4">
                    <p class="text-gray-300 leading-relaxed">
                        To build a highly aligned team of builders, every applicant completes a basic logic demonstration. We evaluate your <strong>curiosity, consistency, and communication</strong> rather than complex expertise.
                    </p>
                    <h3 class="text-xl font-semibold text-white mt-4">The Challenge: Build a Calculator</h3>
                    <p class="text-sm text-gray-400">Supported Environments: C, C++, Python, or Java</p>
                    
                    <div class="bg-gray-950 p-4 rounded-xl border border-gray-800 text-sm">
                        <span class="text-gray-400 font-bold block mb-2">Required Submissions:</span>
                        <ul class="list-disc list-inside space-y-1 text-gray-300">
                            <li>Functional script repository</li>
                            <li>Screen-recorded execution demonstration</li>
                            <li>A summary breakdown of code functionality</li>
                        </ul>
                    </div>
                </div>
            </section>

        <?php elseif ($page === 'projects'): ?>
            <section>
                <h1 class="text-3xl font-bold mb-2">Technical Matrix</h1>
                <p class="text-gray-400 mb-8">Active build cycles managed by TechForge teams.</p>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <?php foreach ($community['projects'] as $project): ?>
                        <div class="bg-gray-900 border border-gray-800 p-6 rounded-2xl relative overflow-hidden">
                            <span class="absolute top-4 right-4 text-xs font-mono px-2 py-1 rounded bg-gray-800 text-cyan-400 border border-gray-700">
                                <?php echo $project['status']; ?>
                            </span>
                            <h3 class="text-xl font-bold text-white mb-2 mt-2"><?php echo $project['title']; ?></h3>
                            <p class="text-gray-400 text-sm leading-relaxed"><?php echo $project['desc']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
    </main>

    <footer class="border-t border-gray-800 bg-gray-900/20 text-center py-6 text-xs text-gray-500">
        &copy; <?php echo date('Y'); ?> <?php echo $community['name']; ?>. All rights reserved.
    </footer>

</body>
</html>
