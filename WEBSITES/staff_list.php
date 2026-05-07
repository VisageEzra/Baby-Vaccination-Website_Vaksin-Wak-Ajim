<?php
include('config.php');
session_start();
include('header.php');

if (!isset($_SESSION['staff_id'])) {
    header("Location: staff_login.php");
    exit();
}

$query = "SELECT * FROM staff";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Staff Management - VAKSIN WAK AJIM</title>
</head>
<body>

    <section>
        <center>

            <h1>Clinic Staff Management</h1>
            <table border="1" cellpadding="10" width="80%">
                <tr>
                    <th>Select</th>
                    <th>Staff Name</th>
                    <th>Specialty</th>
                </tr>

                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td align="center">
                            <input type="radio" name="staff_select" value="<?php echo $row['staff_id']; ?>" 
                                onclick="enableStaffActions(this.value)">
                        </td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['specialty']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>

            <br>

                <h3>Staff Actions</h3>

                <a href="#" id="editStaffLink"><button id="editBtn" style="padding: 15px 30px; font-size: 16px; cursor: not-allowed;" disabled>
                EDIT DETAILS</button></a>
                
                <a href="#" id="deleteStaffLink" onclick="return confirmDelete()"><button id="deleteBtn" style="padding: 15px 30px; font-size: 16px; background-color: #f8d7da; color: #721c24; cursor: not-allowed;" disabled>
                DELETE STAFF</button></a>

                <a href="add_staff.php"><button style="padding: 15px 30px; font-size: 18px; margin-top: 20px; margin-bottom: 20px;">
                ADD STAFF </button></a>

                <a href="staff_dashboard.php"><button style="padding: 15px 30px; font-size: 18px; margin-top: 20px; margin-bottom: 20px;">
                ← Back To Dashboard</button></a>

        </center>
    </section>

    <script>
    function enableStaffActions(id) {
        document.getElementById("editStaffLink").href = "edit_staff.php?id=" + id;
        document.getElementById("editBtn").disabled = false;
        document.getElementById("editBtn").style.cursor = "pointer";

        document.getElementById("deleteStaffLink").href = "delete_staff.php?id=" + id;
        document.getElementById("deleteBtn").disabled = false;
        document.getElementById("deleteBtn").style.cursor = "pointer";
    }

    function confirmDelete() {
        return confirm("Are you sure? Removing a staff member cannot be undone.");
    }
    </script>

    <br><br>
    <?php include('footer.php'); ?> 

</body>
</html>