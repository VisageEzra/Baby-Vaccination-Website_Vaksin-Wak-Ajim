<?php
include('config.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Please login first.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Ambik data dari form
    $baby_id = $_POST['baby_id'];
    $staff_id = $_POST['staff_id'];
    $vaccine_id = $_POST['vaccine_id'];
    $appt_date = $_POST['appt_date'];
    $appt_time = $_POST['appt_time'];
    $notes = $conn->real_escape_string($_POST['notes']);
    $status = 'Pending';

    $sql = "INSERT INTO appointments (baby_id, staff_id, vaccine_id, appt_date, appt_time, notes, status) 
            VALUES ('$baby_id', '$staff_id', '$vaccine_id', '$appt_date', '$appt_time', '$notes', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "<center>";
        echo "<h2>Appointment Booked Successfully!</h2>";
        echo "<p>Your request has been sent to our staff for confirmation.</p>";
        echo "<p><a href='dashboard.php'>Return to Dashboard</a></p>";
        echo "</center>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>