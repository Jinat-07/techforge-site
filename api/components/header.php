<?php
// api/components/header.php
function nav_link($pageName, $label, $currentPage) {
    $activeClass = ($pageName === $currentPage) ? 'text-cyan-400 font-bold border-b-2 border-cyan-400' : 'text-gray-400 hover:text-white';
    $url = ($pageName === 'home') ? '/' : '/?page=' . $pageName;
    return "<a href='{$url}' class='px-3 py-2 transition text-sm md:text-base {$activeClass}'>{$label}</a>";
}
function mobile_nav_link($pageName, $label) {
    $url = ($pageName === 'home') ? '/' : '/?page=' . $pageName;
    return "<a href='{$url}' class='block px-4 py-2 text-gray-300 hover:bg-gray-800 hover:text-white transition rounded-lg text-base'>{$label}</a>";
}
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
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-black tracking-wider text-cyan-400">TECH<span class="text-white">FORGE</span></a>
            
            <nav class="hidden md:flex space-x-6">
                <?php 
                    echo nav_link('home', 'Home', $page);
                    echo nav_link('projects', 'Projects', $page);
                    echo nav_link('members', 'Members', $page);
                ?>
            </nav>

            <button id="menu-toggle" class="md:hidden p-2 text-gray-400 hover:text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden md:hidden px-4 pt-2 pb-4 border-t border-gray-800 bg-gray-950/95 space-y-1">
            <?php 
                echo mobile_nav_link('home', 'Home');
                echo mobile_nav_link('projects', 'Projects');
                echo mobile_nav_link('members', 'Members');
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

    <main class="flex-grow max-w-5xl w-full mx-auto px-4 sm:px-6 py-8 md:py-12">
