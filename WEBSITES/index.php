<?php
include('config.php');
session_start(); 
include('header.php');

// ambik doctors dari table 'staff' untuk display kat bahagian Our Doctors(line 52)
$doctor_info= "SELECT name, specialty FROM staff";
$doctor_result = $conn->query($doctor_info);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VAKSIN WAK AJIM</title>
</head>
<body>

    <!-- Navigation bar kat atas website -->
    <nav>
        <p align="center">
            <a href="#banner">Home</a> | 
            <a href="#services">Services</a> | 
            <a href="#doctors">Our Doctors</a> | 
            <a href="#schedule">book an appointment</a>
        </p>
    </nav>

    <hr> <!-- benda ni macam line pemisah -->

    <section id="banner">
        <center>
            <h1>Protecting Your Little One's Future</h1>
            <img src="IMAGES/family2.png" alt="Gambar letak sini" width="800">
            <p>Reliable vaccination records and scheduling for your child's health.</p>
        </center>
    </section>

    <hr>

    <!-- Nanti sini tukar dengan benda yang betul 🗿 -->
    <section id="services">
        <h2>Our Services</h2>
        <ul>
            <li>National Immunisation Programme (NIP)</li>
            <li>Optional/Add-on Vaccines</li>
            <li>Baby Growth & Superpower</li>
            <li>Health Consultation</li>
        </ul>
    </section>

    <hr>

    <section id="doctors">
        <h2>Meet Our Specialists</h2>
        <table border="1" cellpadding="10" width="60%">
            <tr>
                <th>Doctor Name</th>
                <th>Specialty</th>
            </tr>
            <?php 
            //loop untuk display doctor dari database, selagi ada record
            if ($doctor_result && $doctor_result->num_rows > 0) {
                while($doctor = $doctor_result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>Dr. " . $doctor['name'] . "</td>";
                    echo "<td>" . $doctor['specialty'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "database error";
            }
            ?>
        </table>
    </section>

    <hr>

    <section id="schedule">
        <center>
            <!-- JANGAN UBAH GAMBAQ NI -->
            <h2>Vaccination Schedule Overview</h2>
            <img src="IMAGES/vaccine.jpeg" alt="vaccine plan Banner" width="800">
            <p>Follow the Malaysian National Immunisation Schedule for the best protection.</p>
            
            <!-- butang untuk pi booking.php -->
            <h3>Ready to start?</h3>
            <form action="booking.php" method="GET">
                <button type="submit" style="padding: 20px; font-size: 20px; cursor: pointer;">
                    BOOK A VACCINATION NOW
                </button>
            </form>
            <p><small>Don't have an account? <a href="register.php">Register here</a></small></p>
        </center>
    </section>

    <?php include('footer.php'); ?>

</body>
</html>