<?php
include('config.php');
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //tak bolerh delete diri sendiri
    if ($id == $_SESSION['staff_id']) {
        die("You cannot delete your own account while logged in. <a href='staff_list.php'>Back</a>");
    }

    $sql = "DELETE FROM staff WHERE staff_id = '$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: staff_list.php?msg=deleted");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>