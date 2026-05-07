<?php
include('config.php');
session_start(); 
include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Staff - Klinik Baby</title>
</head>
<body>

    <section>
        <center>

            <br><br>

            <table border="1" cellpadding="20" cellspacing="0" width="400">
                <tr>
                    <td>
                        <center>
                            <h2>Register New Staff</h2>
                            <hr>
                            
                            <form action="add_staff_process.php" method="POST">
                                <table border="0" cellpadding="10" width="100%">

                                <tr>
                                    <td>
                                        <strong>Full Name:</strong><br>
                                        <input type="text" name="name" placeholder="e.g. Dr. Ahmad" style="padding: 10px; width: 90%;" required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Username:</strong><br>
                                        <input type="text" name="username" placeholder="e.g. drahmad88" style="padding: 10px; width: 90%;" required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Specialty:</strong><br>
                                        <input type="text" name="specialty" placeholder="e.g. Pediatrics" style="padding: 10px; width: 90%;" required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Login Password:</strong><br>
                                        <input type="password" name="password" style="padding: 10px; width: 90%;" required>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="center">
                                        <button type="submit" style="padding: 15px 30px; cursor: pointer;">
                                        SAVE STAFF MEMBER</button>
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