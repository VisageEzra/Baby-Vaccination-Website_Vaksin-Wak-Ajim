<?php
include('config.php');
session_start();
include('header.php');

$appt_id = $_GET['id'];
$query = "SELECT * FROM appointments WHERE appt_id = '$appt_id'";
$result = $conn->query($query);
$appt = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<body>

    <br><br>
    <center>
        <h2>Request Reschedule</h2>

        <form action="update_appointment.php" method="POST">
            <input type="hidden" name="appt_id" value="<?php echo $appt['appt_id']; ?>">
            
            <label>New Date:</label>
            <input type="date" name="new_date" value="<?php echo $appt['appt_date']; ?>" required><br><br>
            
            <label>New Time:</label>

            <select name="new_time">
                <option value="09:00">09:00 AM</option>
                <option value="11:00">11:00 AM</option>
                <option value="14:00">02:00 PM</option>
            </select><br><br>
            
            <button type="submit">UPDATE REQUEST</button>
            <a href="dashboard.php">Back</a>
        </form>
    </center>

    <br><br>
    <?php include('footer.php'); ?>

</body>
</html>