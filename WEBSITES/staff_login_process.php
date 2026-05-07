<?php
include('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];


    //check name, password, role
    $sql = "SELECT * FROM staff WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['staff_id'] = $row['staff_id'];
        $_SESSION['staff_name'] = $row['name'];
        header("Location: staff_dashboard.php");
        exit(); 
    } else {
        echo "<center>";
        echo "<h3>Login Failed</h3>";
        echo "No staff found with those credentials or incorrect role. <br>";
        echo "<a href='staff_login.php'>Try again</a>";
        echo "</center>";
    }
}

$conn->close();
?>  