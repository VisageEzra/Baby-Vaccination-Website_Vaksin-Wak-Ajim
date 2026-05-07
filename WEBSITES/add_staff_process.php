<?php
include('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']); // New field
    $name = $conn->real_escape_string($_POST['name']);
    $specialty = $conn->real_escape_string($_POST['specialty']);
    $password = $_POST['password'];

    $sql = "INSERT INTO staff (username, name, specialty, password) 
            VALUES ('$username', '$name', '$specialty', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: staff_list.php?msg=added");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>