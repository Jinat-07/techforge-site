<?php
// api/views/logout.php
// Wipe out cookie expiration parameters instantly
setcookie('tf_session', '', time() - 3600, "/");
header('Location: /?page=login');
exit;
