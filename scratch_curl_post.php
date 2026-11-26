<?php
$ch = curl_init('http://127.0.0.1:8000/admin/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'email' => 'admin@jialearning.app',
    'password' => 'password',
    '_token' => 'invalid_csrf_token',
]));
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Code for POST: $httpcode\n";
echo "Response head:\n" . substr($response, 0, 400) . "\n";
