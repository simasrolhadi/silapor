<?php

$host = 'localhost';
$user = 'root';
$pass = 'getsayang';
$dbname = 'silapor';

$connection = mysqli_connect($host, $user, $pass, $dbname);

if (!$connection) {
    die('connection failed'. mysqli_connect_error());
}

?>