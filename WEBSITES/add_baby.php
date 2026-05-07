<?php
include('config.php');
session_start(); 
include('header.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Baby - VAKSIN WAK AJIM</title>
</head>

<body>
    <section>
        <center>
            <h1>A New Journey of Protection</h1>
            <p>Please provide your child's details so we can help you track their immunisation milestones.</p>
        </center>
    </section>

    <section>
        <center>
            <table border="1" cellpadding="20" cellspacing="0">
                <tr>
                    <td>
                        <center>
                            <h2>Register Your Baby</h2>
                        </center>

                        <form action="add_baby_process.php" method="POST">
                            <table border="0" cellpadding="10">

                                <tr>
                                    <td>Baby's Full Name:</td>
                                    <td><input type="text" name="baby_name" required></td>
                                </tr>
                                
                                <tr>
                                    <td>Date of Birth:</td>
                                    <td>
                                        <input type="date" name="birth_date" id="birth_date" required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Gender:</td>
                                    <td>
                                        <input type="radio" name="gender" value="Male" required> Male
                                        <input type="radio" name="gender" value="Female"> Female
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <br>
                                            <button type="submit" style="width: 100%; padding: 10px;">
                                                SAVE BABY PROFILE
                                            </button>
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

    <br><br>
    <?php include('footer.php'); ?>

</body>
</html>