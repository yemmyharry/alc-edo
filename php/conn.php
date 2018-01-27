<?php
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "");
define('DB_ENGINE', "user");

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_ENGINE);

if ($conn->connect_error) {
    trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

?>
