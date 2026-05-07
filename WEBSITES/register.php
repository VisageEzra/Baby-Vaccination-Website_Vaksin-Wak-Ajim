<?php
include('config.php');
session_start(); 
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Join VASKSIN WAK AJIM today - Protect Your Little One</title>
</head>
<body>

    <section>
        <center>
            <!-- placeholder a ni nanti ubah ayat elok sikit -->
            <h1>Start Vaccinate Your Child Today</h1>
        </center>
    </section>

    <section>
        <center>
            <table border="1" cellpadding="20" cellspacing="0">
                <tr>
                    <td>
                        <center>
                            <h2>Create Parent Account</h2>
                        </center>

                        <form action="register_process.php" method="POST">
                            <table border="0" cellpadding="10">
                                <tr>
                                    <td>Full Name:</td>
                                    <td><input type="text" name="full_name" required></td>
                                </tr>
                                <tr>
                                    <td>Username:</td>
                                    <td><input type="text" name="username" required></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><input type="email" name="email" required></td>
                                </tr>
                                <tr>
                                    <td>Phone Number:</td>
                                    <td><input type="text" name="phone_number" required></td>
                                </tr>
                                <tr>
                                    <td>Password:</td>
                                    <td><input type="password" name="password" required></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <button type="submit" style="width: 100%; padding: 10px;">
                                                CREATE ACCOUNT
                                            </button>
                                        </center>
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <center>
                            <p>Already have an account? <a href="login.php">Login here</a></p>
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