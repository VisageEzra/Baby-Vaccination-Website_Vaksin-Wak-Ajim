<?php
include('config.php');
session_start(); 
include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Staff - VAKSIN WAK AJIM</title>
</head>

<body>

    <section>
        <center>

            <br><br>
            <table border="1" cellpadding="20" cellspacing="0">
                <tr>
                    <td>
                        <center>
                            <h2>Staff Login</h2>
                        </center>

                        <form action="staff_login_process.php" method="POST">
                            <table border="0" cellpadding="10">

                                <tr>
                                    <td>Username:</td>
                                    <td><input type="text" name="username" required></td>
                                </tr>

                                <tr>
                                    <td>Password:</td>
                                    <td><input type="password" name="password" required></td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <button type="submit" style="width: 100%; padding: 10px;">
                                                LOGIN</button>
                                        </center>
                                    </td>
                                </tr>

                            </table>
                        </form>

                    </td>
                </tr>

            </table>
            <br>

        </center>
    </section>

    <br><br>
    <?php include('footer.php'); ?>

</body>
</html>