confirm_appointment.php
<?php
include('config.php');
session_start();

if (!isset($_SESSION['staff_id'])) {
    die("Unauthorized access.");
}

//dapatkan id appointment dari URL
if (isset($_GET['id'])) {
    $appt_id = $_GET['id'];

    // 3. SQL UPDATE Query
    //tukr status 'Pending' jDI  'Confirmed'
    $sql = "UPDATE appointments SET status = 'Confirmed' WHERE appt_id = '$appt_id'";

    if ($conn->query($sql) === TRUE) {
        //Redirect dashboard
        header("Location: staff_dashboard.php?msg=success");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "No appointment ID provided.";
}

$conn->close();
?>