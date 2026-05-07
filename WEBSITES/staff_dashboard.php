<?php
include('config.php');
session_start();
include('header.php');

//staff ja bolrh masuk sini
if (!isset($_SESSION['staff_id'])) {
    header("Location: staff_login.php");
    exit();
}

// Fetch all appointments
$query = 
        "SELECT a.*, b.baby_name, u.full_name AS parent_name, v.vaccine_name 
        FROM appointments a
        JOIN babies b ON a.baby_id = b.baby_id
        JOIN users u ON b.parent_id = u.user_id
        JOIN vaccines v ON a.vaccine_id = v.vaccine_id
        ORDER BY a.appt_date ASC, a.appt_time ASC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff - VAKSIN WAK AJIM</title>
</head>
<body>

    <section>
        <center>
            <h1>Vaccine Appointment Schedule</h1>
            <p>Review and confirm vaccination requests from parents.</p>

            <table border="1" cellpadding="10" width="95%">
                <tr bgcolor="#f2f2f2">
                    <th>Date & Time</th>
                    <th>Baby Name</th>
                    <th>Parent Name</th>
                    <th>Vaccine Type</th>
                    <th>Parent's Notes</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php 
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['appt_date'] . " at " . $row['appt_time'] . "</td>";
                            echo "<td>" . $row['baby_name'] . "</td>";
                            echo "<td>" . $row['parent_name'] . "</td>";
                            echo "<td>" . $row['vaccine_name'] . "</td>";
                            echo "<td><i>" . $row['notes'] . "</i></td>";
                            
                            //tambah warna dekat status baru smart
                            $statusColor = ($row['status'] == 'Pending') ? "orange" : "green";
                            echo "<td style='color:$statusColor;'><strong>" . $row['status'] . "</strong></td>";

                            echo "<td>";
                            if ($row['status'] == 'Pending') {
                                echo "<a href='confirm_appointment.php?id=" . $row['appt_id'] . "'>
                                        <button style='background-color: #4CAF50; color: white;'>APPROVE</button>
                                    </a>";
                            } else {
                                echo "Confirmed";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' align='center'>No appointments scheduled yet.</td></tr>";
                    }
                ?>
            </table>

            <br><br><br>

            <a href="staff_list.php"><button style="padding: 15px 30px; font-size: 18px; margin-top: 20px; margin-bottom: 20px;">
            MANAGE STAFF LIST</button></a>

        </center>
    </section>

    <br><br>
    <?php include('footer.php'); ?>

</body>
</html>