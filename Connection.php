<?php

session_start();
// Use the docker container name here
define('DB_HOST', getenv('DB_HOST') || 'database');
define('DB_PORT', getenv('DB_PORT') || '3306' );
define('DB_NAME', getenv('DB_NAME') || 'Reserveringen');
define('DB_USER', getenv('DB_USER') || 'root');
// Can use root, because this is no longer in production.
//  The stuff in this database is not important.
// On first setup, the root password doesnt exist. make sure you do provide it tho.
define('DB_PASS', getenv('MYSQL_ROOT_PASSWORD') || ' ');


global $PDO;

try {
    // Use the constants in the PDO connection string
    $PDO = $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    // set the PDO error mode to exception
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}