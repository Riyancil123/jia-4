<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$req = Illuminate\Http\Request::create('/test-419', 'GET');
$app['router']->get('/test-419', function() {
    abort(419, 'Session expired');
});

$res = $kernel->handle($req);
echo "Status: " . $res->getStatusCode() . "\n";
echo "Content length: " . strlen($res->getContent()) . "\n";
echo "First 300 chars:\n" . substr($res->getContent(), 0, 300) . "\n";
