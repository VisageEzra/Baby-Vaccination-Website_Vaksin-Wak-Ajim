<?php
include('config.php');
session_start();
include('header.php');

if (!isset($_SESSION['staff_id'])) {
    die("Unauthorized access.");
}

//ambik data staff berdasarkan id
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM staff WHERE staff_id = '$id'");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Staff - VAKSIN WAK AJIM</title>
</head>
<body>

    <section>
        <center>

            <br><br>
            <table border="1" cellpadding="20" cellspacing="0" width="400">
                <tr>
                    <td>
                        <center>
                            <h2>Update Staff Details</h2>
                            <hr>

                            <form action="update_staff_process.php" method="POST">
                                <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">

                                <table border="0" cellpadding="10" width="100%">

                                    <tr>
                                        <td>
                                            <strong>Full Name:</strong><br>
                                            <input type="text" name="name" value="<?php echo $row['name']; ?>" required style="padding: 10px; width: 90%;">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>Username:</strong><br>
                                            <input type="text" name="username" value="<?php echo $row['username']; ?>" required style="padding: 10px; width: 90%;">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <strong>Specialty:</strong><br>
                                            <input type="text" name="specialty" value="<?php echo $row['specialty']; ?>" required style="padding: 10px; width: 90%;">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="center">
                                            <br>
                                            <button type="submit" style="padding: 15px 30px; cursor: pointer;">
                                                UPDATE STAFF MEMBER
                                            </button>
                                        </td>
                                    </tr>

                                </table>
                            </form>
                            <br>
                            <a href="staff_list.php">Cancel and Go Back</a>
                        </center>

                    </td>
                </tr>
            </table>

        </center>
    </section>

    <br><br>
    <?php include('footer.php'); ?>

</body>
</html>