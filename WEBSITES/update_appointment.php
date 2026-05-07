<?php
include('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //ambik data
    $appt_id = $_POST['appt_id'];
    $new_date = $_POST['new_date'];
    $new_time = $_POST['new_time'];

    
    //kalau dah update nanti status tukar jadi 'Pending' 
    // ni untuk staff tengook and approve balik
    $sql = "UPDATE appointments 
            SET appt_date = '$new_date', 
                appt_time = '$new_time', 
                status = 'Pending' 
            WHERE appt_id = '$appt_id'";

    if ($conn->query($sql) === TRUE) {
        //Redirect dashboard
        header("Location: dashboard.php?msg=updated");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>