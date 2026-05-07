<?php
include('config.php');
session_start(); 
include('header.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parent Login - Klinik Baby</title>
</head>
<body>

    <section>
        <!-- placeholder ja ni nanti ubah ayat elok sikit -->
        <center>
            <h1>Turn your children into SpiderMan</h1>
        </center>
    </section>

    <section>
        <center>
            <table border="1" cellpadding="20" cellspacing="0">
                <tr>
                    <td>
                        <center>
                            <h2>Login To Account</h2>
                        </center>

                        <form action="login_process.php" method="POST">
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
                                                SIGN IN
                                            </button>
                                        </center>
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <center>
                            <p>No account yet? <a href="register.php">Create an Account</a></p>
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