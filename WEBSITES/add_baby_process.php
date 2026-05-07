<?php
include('config.php');
session_start();

// Cek kalau user dah login
if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access. Please <a href='login.php'>login</a> first.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //ambik data
    $baby_name = $conn->real_escape_string($_POST['baby_name']);
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $parent_id = $_SESSION['user_id']; //Foreign Key

    //kira umuq baby guna PHP untuk display
    $today = new DateTime();
    $bday = new DateTime($birth_date);
    $interval = $today->diff($bday);
    $age_in_months = ($interval->y * 12) + $interval->m;

    //insert baby data
    $sql = "INSERT INTO babies (parent_id, baby_name, birth_date, gender) 
            VALUES ('$parent_id', '$baby_name', '$birth_date', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "<center>";
        echo "<h2>Baby Successfully Registered!</h2>";
        echo "<p><strong>$baby_name</strong> is currently <strong>$age_in_months month(s) old</strong>.</p>";
        echo "<p><a href='dashboard.php'>Return to Dashboard</a> | <a href='booking.php'>Book an Appointment</a></p>";
        echo "</center>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>