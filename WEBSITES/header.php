<?php
// sinis tak payah letak session_start() sebab semua fail dah ada benda tu, kalau letak error 🗿
?>
<header class="main-header">
    <link rel="stylesheet" href="style.css">
    <div class="header-container">
        <div class="header-left">
            <!-- ni belah kiri header -->
            <a href="index.php" class="header-logo">
                VAKSIN WAK AJIM
            </a>
        </div>

        <!-- ni belah kanan header -->
        <div class="header-right">
            <!-- ni untuk parent -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- <strong> ni sama macam bold -->
                <span class="welcome-text">Welcome back, <strong><?php echo $_SESSION['full_name']; ?></strong></span>
                <span class="separator">|</span>
                <a href="dashboard.php" class="header-link">My Dashboard</a>
                <span class="separator">|</span>
                <a href="logout.php" class="header-link">Logout</a>

            <!-- ni untuk staff pulak -->
            <?php elseif (isset($_SESSION['staff_id'])): ?>
                <span class="welcome-text">Dr. <strong><?php echo $_SESSION['staff_name']; ?></strong></span>
                <span class="separator">|</span>
                <a href="staff_dashboard.php" class="header-link">Staff Dashboard</a>
                <span class="separator">|</span>
                <a href="logout.php" class="header-link">Logout</a>

            <!-- kalau tak login lagi -->
            <?php else: ?>
                <a href="login.php" class="header-link">Parent Login</a>
                <span class="separator">|</span>
                <a href="register.php" class="header-link">Register</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<hr class="header-divider">