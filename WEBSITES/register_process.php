<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //ambik data dati xampp
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $password = $_POST['password'];

    //ni command sql
    $sql = "INSERT INTO users (username, password, email, full_name, phone_number) 
            VALUES ('$username', '$password', '$email', '$full_name', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close
$conn->close();
?>