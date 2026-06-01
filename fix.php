<?php

use App\Models\Karyawan;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$user = Karyawan::where('Email', 'admin@Inventrack.com')->first();
if ($user) {
    $user->Email = 'admin@inventrack.com'; // lowercase 'i'
    $user->save();
    echo "Email updated to lowercase\n";
} else {
    echo "User not found\n";
}
