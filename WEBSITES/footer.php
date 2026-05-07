<hr>
<footer style="padding: 20px; text-align: center; color: #666;">
    <p>&copy; 2025 VAKSIN WAK AJIM</p>
    
    <?php 
    
    // kalau belum login, link staff login kat bawah kanan footer 
    // kalau dah login,"I am a Staff" tu hilang
    if (!isset($_SESSION['user_id']) && !isset($_SESSION['staff_id'])): 
    ?>
        <p align="right"><a href="staff_login.php" style="color: #5a5959ff; text-decoration: none;">I am a Staff</a></p>
    <?php endif; ?>
</footer>