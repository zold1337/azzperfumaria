<?php

$key = $_SERVER['HTTP_X_API_KEY'] ?? '';

if ($key !== 'MINHA_KEY_SECRETA') {
    http_response_code(403);
    exit('Forbidden');
}

$file = __DIR__ . '/files/eleven.bin';

if (!file_exists($file)) {
    http_response_code(404);
    exit('Not found');
}

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="eleven.exe"');
header('Content-Length: ' . filesize($file));
header('Cache-Control: no-store');

readfile($file);
exit;
