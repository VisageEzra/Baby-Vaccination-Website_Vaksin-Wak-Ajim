<?php
include('config.php');
session_start();

if (isset($_GET['id'])) {
    $appt_id = $_GET['id'];
    
    // SQL DELETE
    $sql = "DELETE FROM appointments WHERE appt_id = '$appt_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php?msg=cancelled");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>