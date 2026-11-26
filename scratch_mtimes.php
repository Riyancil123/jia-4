<?php
$files = [
    'app/Exceptions/Handler.php',
    'resources/views/errors/419.blade.php',
    'public/css/jia-style.css',
    'public/js/jia-script.js',
    'resources/views/admin/auth/login.blade.php',
];

foreach ($files as $f) {
    if (file_exists($f)) {
        echo "$f: " . date("Y-m-d H:i:s", filemtime($f)) . "\n";
    } else {
        echo "$f: NOT FOUND\n";
    }
}
