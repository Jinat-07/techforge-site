<?php
// api/views/update_handler.php
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_COOKIE['tf_session'])) {
    header('Location: /?page=dashboard');
    exit;
}

$session = json_decode(base64_decode($_COOKIE['tf_session']), true);

$payload = [
    "action" => "update_profile",
    "member_id" => $session['id'],
    "name" => trim($_POST['name'] ?? ''),
    "role" => trim($_POST['role'] ?? ''),
    "github" => trim($_POST['github'] ?? '')
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
$result = json_decode($response, true);

if ($result && $result['success'] === true) {
    // Regenerate browser cookie tracking configuration
    $session['name'] = $payload['name'];
    $session['role'] = $payload['role'];
    $session['github'] = $payload['github'];
    setcookie('tf_session', base64_encode(json_encode($session)), time() + (86400 * 7), "/", "", false, true);
    
    header('Location: /?page=dashboard&success=Profile records synchronized successfully!');
} else {
    header('Location: /?page=dashboard&error=Profile database save tracking failed.');
}
exit;
