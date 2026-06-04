<?php
// api/components/header.php
function nav_link($pageName, $label, $currentPage) {
    $activeClass = ($pageName === $currentPage) ? 'text-cyan-400 font-bold border-b-2 border-cyan-400' : 'text-gray-400 hover:text-white';
    $url = ($pageName === 'home') ? '/' : '/?page=' . $pageName;
    return "<a href='{$url}' class='px-3 py-2 transition text-sm font-semibold tracking-wider font-brand {$activeClass}'>{$label}</a>";
}
function mobile_nav_link($pageName, $label) {
    $url = ($pageName === 'home') ? '/' : '/?page=' . $pageName;
    return "<a href='{$url}' class='block px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white font-brand tracking-widest transition rounded-lg text-sm uppercase'>{$label}</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $community['name'] . " | " . ucfirst($page); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Orbitron:wght@700;900&display=swap" rel="stylesheet">

    <style>
        .font-brand { font-family: 'Orbitron', sans-serif; }
        .font-body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-950 text-gray-100 font-body min-h-screen flex flex-col antialiased">

    <header class="border-b border-gray-900 bg-gray-950/80 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-4 py-3 flex justify-between items-center">
            
            <a href="/" class="flex flex-col tracking-wider font-brand group">
                <span class="text-xl md:text-2xl font-black text-white leading-none tracking-widest transition group-hover:text-cyan-400">TECHFORGE</span>
                <span class="text-[9px] md:text-[10px] uppercase font-bold text-cyan-400 tracking-[0.25em] leading-none mt-1">COMMUNITY</span>
            </a>
            
            <nav class="hidden md:flex space-x-4 items-center">
                <?php 
                    echo nav_link('home', 'HOME', $page);
                    echo nav_link('projects', 'PROJECTS', $page);
                    echo nav_link('members', 'MEMBERS', $page);
                    
                    // ====== UPDATE: DESKTOP AUTH BUTTON ======
                    if (isset($is_logged_in) && $is_logged_in) {
                        echo nav_link('dashboard', 'DASHBOARD', $page);
                    } else {
                        echo nav_link('login', 'LOGIN', $page);
                    }
                ?>
            </nav>

            <button id="menu-toggle" class="md:hidden p-2 text-gray-400 hover:text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden md:hidden px-3 pt-2 pb-4 border-t border-gray-900 bg-gray-950/95 space-y-1">
            <?php 
                echo mobile_nav_link('home', 'HOME');
                echo mobile_nav_link('projects', 'PROJECTS');
                echo mobile_nav_link('members', 'MEMBERS');
                
                // ====== UPDATE: MOBILE AUTH BUTTON ======
                if (isset($is_logged_in) && $is_logged_in) {
                    echo mobile_nav_link('dashboard', 'DASHBOARD');
                } else {
                    echo mobile_nav_link('login', 'LOGIN');
                }
            ?>
        </div>
    </header>

    <script>
        const btn = document.getElementById('menu-toggle');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

    <main class="flex-grow max-w-5xl w-full mx-auto px-4 py-8 md:py-12">
