<?php

$key = $_SERVER['HTTP_X_API_KEY'] ?? '';

if ($key !== 'MINHA_KEY_SECRETA') {
    header('Location: ../../index.php');
    exit;
}

$file = __DIR__ . '/eleven.exe';

if (!file_exists($file)) {
    http_response_code(404);
    exit;
}

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="eleven.exe"');
header('Content-Length: ' . filesize($file));

readfile($file);
exit;
