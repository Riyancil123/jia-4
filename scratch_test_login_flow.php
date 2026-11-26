<?php
$cookieJar = __DIR__ . '/scratch_cookies.txt';
if (file_exists($cookieJar)) unlink($cookieJar);

// 1. GET login page
$ch = curl_init('http://127.0.0.1:8000/admin/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieJar);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieJar);
$html = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "Step 1: GET /admin/login => Status $code\n";

// Extract CSRF token
preg_match('/name="_token"\s+value="([^"]+)"/', $html, $matches);
$csrfToken = $matches[1] ?? null;
echo "CSRF token extracted: " . ($csrfToken ? substr($csrfToken, 0, 15) . '...' : 'NONE') . "\n";

// 2. POST login form with extracted CSRF token and cookie
$ch = curl_init('http://127.0.0.1:8000/admin/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    '_token' => $csrfToken,
    'email' => 'admin@jialearning.app',
    'password' => 'password',
]));
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieJar);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieJar);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_HEADER, true);
$res = curl_exec($ch);
$postCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "Step 2: POST /admin/login => Status $postCode\n";
echo "Response headers:\n" . substr($res, 0, 400) . "\n";
