<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// 1. GET /admin/login
$req = Illuminate\Http\Request::create('/admin/login', 'GET');
$res = $kernel->handle($req);
echo "GET /admin/login status: " . $res->getStatusCode() . "\n";

// 2. POST /admin/login without CSRF token
$req2 = Illuminate\Http\Request::create('/admin/login', 'POST', [
    'email' => 'admin@jialearning.app',
    'password' => 'password123',
]);
$res2 = $kernel->handle($req2);
echo "POST /admin/login (no CSRF) status: " . $res2->getStatusCode() . "\n";
if ($res2->isRedirection()) {
    echo "Redirect target: " . $res2->getTargetUrl() . "\n";
} else {
    echo "Response content preview: " . substr($res2->getContent(), 0, 200) . "\n";
}
