<?php
include('config.php');
session_start();
include('header.php');

// pastikan user dah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$parent_id = $_SESSION['user_id'];

//ambik data anak parent ni dari database
$baby_query = "SELECT * FROM babies WHERE parent_id = '$parent_id'";
$baby_result = $conn->query($baby_query);

//sama macam atas tapi ni untuk appointment
$appt_query = 
    "SELECT a.*, b.baby_name, v.vaccine_name 
    FROM appointments a
    JOIN babies b ON a.baby_id = b.baby_id
    JOIN vaccines v ON a.vaccine_id = v.vaccine_id
    WHERE b.parent_id = '$parent_id'
    ORDER BY a.appt_date ASC";
$appt_result = $conn->query($appt_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - VAKSIN WAK AJIM</title>
</head>
<body>

    <section class="dashboard-section">
        <div class="dashboard-container">
            <h2>My Children</h2>
            <table class="data-table children-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Birth Date</th>
                        <th>Gender</th>
                    </tr>
                </thead>

                <?php 
                    if ($baby_result->num_rows > 0) {
                        while($baby = $baby_result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $baby['baby_name'] . "</td>";
                            echo "<td>" . $baby['birth_date'] . "</td>";
                            echo "<td>" . $baby['gender'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3' class='no-data'>No babies registered. <a href='add_baby.php'>Add one now</a></td></tr>";
                    }
                ?>
            </table>

            <!-- butan besar untuk tambah profile baby baru -->
            <a href="add_baby.php" class="btn-link">
                <button class="btn btn-primary add-baby-btn">
                    + Add New Baby Profile
                </button>
            </a>

            <div class="spacer"></div>

            <h2>Upcoming Appointments</h2>
            <table class="data-table appointments-table">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Baby Name</th>
                        <th>Vaccine</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <?php 
                // Loop appointment cari and display semua yang berkaitan dengan parent ni
                    if ($appt_result->num_rows > 0) {
                        while($appt = $appt_result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><input type='radio' name='selected_appt' value='" . $appt['appt_id'] . "' onclick='enableButtons(this.value)'></td>";
                            echo "<td>" . $appt['baby_name'] . "</td>";
                            echo "<td>" . $appt['vaccine_name'] . "</td>";
                            echo "<td>" . $appt['appt_date'] . " @ " . $appt['appt_time'] . "</td>";
                            echo "<td><strong class='status-text'>" . $appt['status'] . "</strong></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='no-data'>No appointments found.</td></tr>";
                    }
                ?>
            </table>

            <a href="booking.php" class="btn-link">
                <button class="btn btn-primary make-appt-btn">
                    + Make New Appointment 
                </button>
            </a>

            <div class="appointment-actions">

                <h3>Appointment Actions</h3>
                <p>Please select an appointment from the table above first.</p>
                
                <a href="#" id="editLink" class="action-link disabled-link">
                    <button id="editBtn" class="btn action-btn edit-btn" disabled>
                        EDIT DATE/TIME
                    </button>
                </a>

                <a href="#" id="cancelLink" class="action-link disabled-link" onclick="return confirmCancel()">
                    <button id="cancelBtn" class="btn action-btn cancel-btn" disabled>
                        CANCEL APPOINTMENT
                    </button>
                </a>
            </div>

        </div>
    </section>
</html>

<script>
//kalau parents pilih satu appointment, butang edit and cancel tu baru boleh tekan
function enableButtons(id) {
    //untuk butang edit
    document.getElementById("editLink").href = "edit_appointment.php?id=" + id;
    document.getElementById("editBtn").disabled = false;
    document.getElementById("editBtn").style.cursor = "pointer";
    document.getElementById("editBtn").style.backgroundColor = "#e1f5fe";

    //buatng cancel. kalau tak select apa apa nanti buatng tu ada 🚫 kalau hover
    document.getElementById("cancelLink").href = "cancel_appointment.php?id=" + id;
    document.getElementById("cancelBtn").disabled = false;
    document.getElementById("cancelBtn").style.cursor = "pointer";
    document.getElementById("cancelBtn").style.backgroundColor = "#ffebee";
}

function confirmCancel() {
    return confirm("Are you sure you want to cancel this appointment? This action is permanent.");
}
</script>

    <?php include('footer.php'); ?>