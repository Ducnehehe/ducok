<?php
$host = getenv('DB_HOST') ?: 'localhost'; 
$connection = mysqli_connect($host, 'root', '123456', 'book_db');
if (!$connection) {
    die("Could not connect: " . mysqli_connect_error());
} else {
    echo 'Connection established';
}
?>
