<?php
require_once __DIR__ ."/Database.php";

use Database\DatabaseConection;

$conn = DatabaseConection::getConnection();

echo "Database terkoneksi".PHP_EOL;
?>