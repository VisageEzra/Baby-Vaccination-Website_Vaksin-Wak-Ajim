<?php
include('config.php');
session_start();
include('header.php');

//ni sama macam page sebelum sebelum ni nak cek user login ka dak ja aku dah malas nak tulis ulang dah
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$parent_id = $_SESSION['user_id'];

//ambik data baby
$baby_query = "SELECT *, TIMESTAMPDIFF(MONTH, birth_date, CURDATE()) AS age_months FROM babies WHERE parent_id = '$parent_id'";
$baby_result = $conn->query($baby_query);

//ambik data staff
$staff_query = "SELECT * FROM staff"; 
$staff_result = $conn->query($staff_query);

//ambik vaksin
$vaccine_query = "SELECT * FROM vaccines";
$vaccine_result = $conn->query($vaccine_query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Vaccination - VAKSIN WAK AJIM</title>
</head>

    <section>
        <center>
            <h2>Schedule a Vaccination</h2>
            <p>Ensure your child is protected by booking their next appointment below.</p>

            <table border="1" cellpadding="20" cellspacing="0" width="60%">
                <tr>
                    <td>

                        <form action="booking_process.php" method="POST" id="bookingForm">
                            <table border="0" cellpadding="10" width="100%">
                                
                                <tr>
                                    <td>Select Child:</td>
                                    <td>
                                        <select name="baby_id" id="baby_select" required onchange="showAgeAlert()">
                                            <option value="">-- Choose Baby --</option>
                                            <?php while($baby = $baby_result->fetch_assoc()): ?>
                                                <option value="<?php echo $baby['baby_id']; ?>" data-age="<?php echo $baby['age_months']; ?>">
                                                    <?php echo $baby['baby_name']; ?> (<?php echo $baby['age_months']; ?> Months)
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Select Doctor:</td>
                                    <td>
                                        <select name="staff_id" required>
                                            <option value="">-- Choose Specialist --</option>
                                            <?php while($staff = $staff_result->fetch_assoc()): ?>
                                                <option value="<?php echo $staff['staff_id']; ?>">
                                                    Dr. <?php echo $staff['name']; ?> (<?php echo $staff['specialty']; ?>)
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Appointment Date:</td>
                                    <td><input type="date" name="appt_date" required></td>
                                </tr>
                                
                                <tr>
                                    <td>Time Slot:</td>
                                    <td>
                                        <select name="appt_time" required>
                                            <option value="09:00">09:00 AM</option>
                                            <option value="11:00">11:00 AM</option>
                                            <option value="14:00">02:00 PM</option>
                                            <option value="16:00">04:00 PM</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Vaccine Required:</td>
                                    <td>
                                        <select name="vaccine_id" required>
                                            <option value="">-- Select Vaccine --</option>
                                            <?php while($vac = $vaccine_result->fetch_assoc()): ?>
                                                <option value="<?php echo $vac['vaccine_id']; ?>">
                                                    <?php echo $vac['vaccine_name']; ?> (Month <?php echo $vac['recommended_month']; ?>)
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Email (Optional):</td>
                                    <td><input type="email" name="email"></td>
                                </tr>
                                
                                <tr>
                                    <td>Phone Number:</td>
                                    <td><input type="text" name="phone" placeholder="Malaysian or International" required></td>
                                </tr>

                                <tr>
                                    <td valign="top">Notes/Enquiries:</td>
                                    <td>
                                        <textarea name="notes" rows="4" style="width: 100%;" placeholder="Anything the doctor should know?"></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <button type="submit" style="padding: 10px; width: 100%;">CONFIRM BOOKING</button>
                                        </center>
                                    </td>
                                </tr>

                            </table>
                        </form>

                    </td>
                </tr>
            </table>
        </center>
    </section>

    <script>
        // JS ni banyak function dia aku buat sebab nak bagi alert ja asal ada lol
        function showAgeAlert() {
            var select = document.getElementById("baby_select");
            var selectedOption = select.options[select.selectedIndex];
            var age = selectedOption.getAttribute("data-age");

            if(age) {
                alert("This child is " + age + " months old. Please ensure you choose the correct vaccine for their age group.");
            }
        }
    </script>

    <br><br>
    <?php include('footer.php'); ?>

</body>
</html>