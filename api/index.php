<?php
// api/index.php

// 1. Pull in the data engine
require_once __DIR__ . '/config.php';

// 2. Resolve safe page parameter routing
$allowed_pages = ['home', 'projects', 'members'];
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}

// 3. Assemble components dynamically
require_once __DIR__ . '/components/header.php';
require_once __DIR__ . "/views/{$page}.php";
require_once __DIR__ . '/components/footer.php';
