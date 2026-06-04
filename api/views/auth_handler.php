<?php
// api/views/auth_handler.php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?page=login');
    exit;
}

$member_id = trim($_POST['member_id'] ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($member_id) || empty($password)) {
    header('Location: /?page=login&error=Missing fields');
    exit;
}

// Prepare the payload structured for the Google Script POST processor
$payload = [
    "action" => "login",
    "member_id" => $member_id,
    "password" => $password
];

$options = [
    "http" => [
        "method" => "POST",
        "header" => "Content-Type: application/json\r\n",
        "content" => json_encode($payload),
        "timeout" => 10
    ]
];

$context = stream_context_create($options);
$response = @file_get_contents(GOOGLE_API_URL, false, $context);

if ($response === FALSE) {
    header('Location: /?page=login&error=Database communication error');
    exit;
}

$result = json_decode($response, true);

if (isset($result['success']) && $result['success'] === true) {
    // Session payload bundle containing member identity properties
    $session_bundle = [
        "id" => $result['member']['id'],
        "name" => $result['member']['name'],
        "role" => $result['member']['role'],
        "github" => $result['member']['github']
    ];
    
    // Set a secure authentication cookie valid for 7 days
    $cookie_value = base64_encode(json_encode($session_bundle));
    setcookie('tf_session', $cookie_value, time() + (86400 * 7), "/", "", false, true);
    
    header('Location: /?page=dashboard');
} else {
    $msg = urlencode($result['message'] ?? 'Invalid Credentials');
    header("Location: /?page=login&error={$msg}");
}
exit;
