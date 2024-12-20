<?php

require_once( __DIR__ . '/constants.php' );

/* ============================================ */

$servername = "localhost";
$username = "doinikne_ex";
$password = "Q0upjb@9?xAL";

/* ============================================ */

$database = _DB_NAME_;

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>