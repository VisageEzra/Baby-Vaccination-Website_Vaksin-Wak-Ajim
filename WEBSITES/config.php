<?php
//ni ambik kat lab 7
// sambung website dengan database xampp

$host = "localhost";
$username = "root";
$password = "";
$dbname = "babyvaccine";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>