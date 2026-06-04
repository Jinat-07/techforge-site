<?php
// api/index.php
require_once __DIR__ . '/config.php';

// Check if a member cookie exists to track authentication state
$is_logged_in = false;
$current_member = null;

if (isset($_COOKIE['tf_session'])) {
    $session_data = json_decode(base64_decode($_COOKIE['tf_session']), true);
    if ($session_data && isset($session_data['id'])) {
        $is_logged_in = true;
        $current_member = $session_data;
    }
}

// Define accessible page routes
$allowed_pages = ['home', 'projects', 'members', 'login', 'dashboard', 'auth_handler', 'logout', 'update_handler', 'project_handler'];
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}

// Protect the dashboard from unauthorized access
if ($page === 'dashboard' && !$is_logged_in) {
    header('Location: /?page=login');
    exit;
}

// Redirect already logged-in users away from the login page
if ($page === 'login' && $is_logged_in) {
    header('Location: /?page=dashboard');
    exit;
}

// Execute logic-only background actions without loading the visual design shell
$background_actions = ['auth_handler', 'logout', 'update_handler', 'project_handler'];
if (in_array($page, $background_actions)) {
    require_once __DIR__ . "/views/{$page}.php";
    exit;
}

// Load standard front-facing pages with the global structural layout components
require_once __DIR__ . '/components/header.php';
require_once __DIR__ . "/views/{$page}.php";
require_once __DIR__ . '/components/footer.php';
