<?php
// api/views/project_handler.php
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_COOKIE['tf_session'])) {
    header('Location: /?page=dashboard');
    exit;
}

$session = json_decode(base64_decode($_COOKIE['tf_session']), true);

$payload = [
    "action" => "add_project",
    "member_id" => $session['id'],
    "title" => trim($_POST['title'] ?? ''),
    "status" => trim($_POST['status'] ?? ''),
    "description" => trim($_POST['description'] ?? '')
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
    header('Location: /?page=dashboard&success=Project entry logged successfully!');
} else {
    header('Location: /?page=dashboard&error=Project row creation error.');
}
exit;
